function opensidebar(){
    if(document.documentElement.clientWidth <= 600){
        document.querySelector('.sidebar').style.left = '0px'
        document.querySelector('.sidebar').style.boxShadow = 'var(--box-shadow)'
        document.querySelector('.content').style.opacity = "0.2";
        document.querySelector('.menuicon').style.display = 'none'
        document.querySelector('.closeicon').style.display = 'initial'
    }
  
  }
  
  function closesidebar(){
    if(document.documentElement.clientWidth <= 600){
        document.querySelector('.sidebar').style.left = '-80vw'
        document.querySelector('.sidebar').style.boxShadow = 'none'
        document.querySelector('.content').style.opacity = "1";
        document.querySelector('.menuicon').style.display = 'initial'
        document.querySelector('.closeicon').style.display = 'none'
    }
  }