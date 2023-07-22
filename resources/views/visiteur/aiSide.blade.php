@extends('layouts.visitor.body')
@section('content')

<div>
    <h1 class="text-primary" align="center">AI Side - AI Text Analysis</h1>

    <form method="POST" action="{{ route('visiteur.aiSearchMemoire') }}">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="memoireId">Memoire ID</label>
                <input type="text" class="form-control" id="memoireId" placeholder="Enter the Memoire ID" name="projId">
            </div>
            <div class="form-group" style="padding:20px 0px;">
                <button type="submit" class="btn btn-primary">Search Memoire</button>
            </div>
        </div>
    </form>

    @if (isset($error))
        <div class="alert alert-danger mt-3">
            {{ $error }}
        </div>
    @endif

    @if (isset($projectInfo))
        <div class="project-info mt-3">
            <h2>Project Information</h2>
            <p><strong>Theme:</strong> {{ $projectInfo['theme'] }}</p>
            <p><strong>Abstract:</strong> {{ $projectInfo['abstract'] }}</p>
            <p><strong>Language:</strong> {{ $projectInfo['language'] }}</p>
            <!-- Display other project information as needed -->
        </div>

        <h2>Extracted Text from Memoire</h2>
        <pre>{!! $pdfText !!}</pre>

        <h2>Summary</h2>
        <pre>{!! $summary !!}</pre>

        <h2>AI Analysis</h2>
        <div>
            <form id="chatForm" method="POST" action="{{ route('visiteur.aiAnalysis') }}">
                @csrf
                {{-- <input type="hidden" name="projId" value="{{ $projectInfo['id'] }}"> --}}
                <div class="form-row">
                    <div class="form-group">
                        <label for="resumeLang">Select Language:</label>
                        <select class="form-control" id="resumeLang" name="resumeLang">
                            <option value="fr">French</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" >
                    {{-- <div class="form-group">
                        <label for="prompt">Enter Prompt:</label>
                        <textarea class="form-control" id="prompt" name="prompt" rows="4" placeholder="Enter your prompt here"></textarea>
                    </div>
                    <div class="form-group" style="padding:20px 0px;"> --}}
                        <button type="button" id="analyzeBtn" class="btn btn-primary" style="margin: 20px">Analyze</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="chatbox" class="mt-4" style="display:none;">
            <h2>Chat with AI</h2>
            <div id="chatMessages"></div>
            <div class="form-row">
                <div class="form-group">
                    <label for="userInput">Your Message:</label>
                    <textarea class="form-control" id="userInput" name="userInput" rows="4" placeholder="Enter your message here"></textarea>
                </div>
                <div class="form-group" style="padding:20px 0px;">
                    <button type="button" id="sendBtn" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const chatbox = document.getElementById("chatbox");
        const chatMessages = document.getElementById("chatMessages");
        const userInput = document.getElementById("userInput");
        const analyzeBtn = document.getElementById("analyzeBtn");
        const sendBtn = document.getElementById("sendBtn");
        const chatForm = document.getElementById("chatForm");

        // Function to append a message to the chatbox
        function appendMessage(text, isUser = false) {
            const messageDiv = document.createElement("div");
            messageDiv.classList.add("message");
            if (isUser) {
                messageDiv.classList.add("user");
            }
            messageDiv.textContent = text;
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Function to send user input to the AI
        function sendMessageToAI(prompt) {
            // Use AJAX to send user input to the Laravel backend
            fetch(chatForm.action, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": chatForm._token.value,
                },
                body: JSON.stringify({
                    projId: chatForm.projId.value,
                    prompt: prompt,
                    resumeLang: chatForm.resumeLang.value,
                }),
            })
            .then((response) => response.json())
            .then((data) => {
                // Display AI response in the chatbox
                appendMessage(data.response, false);
            })
            .catch((error) => {
                console.error("Error sending message:", error);
            });
        }

        // Event listener for the Analyze button
        analyzeBtn.addEventListener("click", function() {
            const prompt = userInput.value;
            appendMessage(prompt, true);
            sendMessageToAI(prompt);
            userInput.value = "";
        });

        // Event listener for the Send button (in the chatbox)
        sendBtn.addEventListener("click", function() {
            const prompt = userInput.value;
            appendMessage(prompt, true);
            sendMessageToAI(prompt);
            userInput.value = "";
        });

        // Show the chatbox when the Analyze button is clicked
        analyzeBtn.addEventListener("click", function() {
            chatbox.style.display = "block";
        });

        // Hide the chatbox initially
        chatbox.style.display = "none";
    });
</script>
@endsection
