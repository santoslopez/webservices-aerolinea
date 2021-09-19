// show navbar

const showNavBar = (toggleId, navId,bodyId,headerId) =>{
    const toggle = document.getElementById(toggleId),

    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerypd = document.getElementById(headerId);



    // validate that all variables exist
    if (toggle && nav && bodypd && headerypd) {
        toggle.addEventListener('click',()=>{
            // show navbar
            nav.classList.toggle('show')

            //change icon
            toggle.classList.toggle('bx-x')

            //add padding to body
            bodypd.classList.toggle('body-pd')

            // add padding to header
            headerypd.classList.toggle('body-pd')

        })
    }

}

// link active
const linkColor = document.querySelectorAll('.nav__link')
function colorLink(params) {
    if (linkColor) {
        linkColor.forEach(l => l.classList.remove('active'))
        this.classList.add('active')
    }
}



showNavBar('header-toggle','nav-bar','body-pd','header');

linkColor.forEach(l => l.addEventListener('click',colorLink))
