let inquiry = document.querySelectorAll('.add-inquiry');

for (let i=0; i<inquiry.length; i++){
    inquiry[i].addEventListener('click', () => {
        console.log("inquiry added")
    });
}

