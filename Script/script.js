/*DropMenu*/

const navBarBtn = document.querySelector('.navBtn');
const navBarLinks = document.querySelector('.navbarLinks');

navBarBtn.addEventListener('click',  () => {
    var value = navBarLinks.classList.contains('navbarDrop');

    if (value) {
        navBarLinks.classList.remove('navbarDrop');
        navBarBtn.classList.remove('change')
    }
    else {
        navBarLinks.classList.add('navbarDrop');
        navBarBtn.classList.add('change')
    }
});

//To Top Function
  const toTop = document.querySelector('.topBtn')

  window.addEventListener('scroll', function() {
    if(document.body.scrollTop > 0 || document.documentElement.scrollTop > 200){
      toTop.style.display = 'block';
    }
    else{
      toTop.style.display = 'none';
    }
  })
  toTop.addEventListener('click', function(){
    window.scroll({
      top: 0,
      behavior: "smooth"
    })
  })
  