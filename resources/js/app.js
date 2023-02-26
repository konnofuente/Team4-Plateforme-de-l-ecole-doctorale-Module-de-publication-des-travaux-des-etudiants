
import.meta.glob([
    '../images/**'
])

const word = 'Architecture'
const resultSection = document.getElementById('search_results');
const filesHtmlCollection = Array.from(document.getElementsByClassName('single-doc-container'))
let fileContents=[];

console.log(filesHtmlCollection)
if(filesHtmlCollection){
             filesHtmlCollection.forEach(file=>{
            if(file.innerText.includes(word)){
                resultSection.appendChild(file)
                }
            })
}
else{

}

