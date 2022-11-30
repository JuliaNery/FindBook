var btnClose = document.querySelector('.close-preview-js');
    var output = document.getElementById("new");
    var loaderFile = function(event){
    var reader = new FileReader();
      reader.onload = function() {
        output.style.display = "block";
        btnClose.style.display = "block";
        output.style.backgroundImage = "url("+reader.result+")";
      }
      reader.readAsDataURL(event.target.files[0]);
    }

    var editarAvatar = document.querySelector(".editar-content");
    var buttonFile = document.getElementById("file-preview-js");

    editarAvatar.addEventListener("click", function(){
      buttonFile.click();
    });

    btnClose.addEventListener("click", function(){
      btnClose.style.display = "none";
      output.style.backgroundImage = "url('')";
      document.getElementById("file-preview-js").value = "";
    });


    // Progresso

    const nextButton = document.querySelector('.btn-next');
    const prevButton = document.querySelector('.btn-prev');
    const steps = document.querySelectorAll('.form-step');
    
    const form_steps = document.querySelectorAll('.step');
    let active = 1;
    
    nextButton.addEventListener('click', () => {
        active++;
        if(active > steps.length){
            active = steps.length;
        }
        updateProgress();
    })
    
    prevButton.addEventListener('click', () => {
        active--;
        if(active < 1){
            active = 1;
        }
        updateProgress();
    })
    
    const updateProgress = () => {
        console.log('steps.length =>' + steps.length);
        console.log('active =>'+ active);
    
        steps.forEach((step, i) =>{
            if (i == (active-1)) {
                step.classList.add('active');
                form_steps[i].classList.add('active');
                console.log('i =>'+i);
            }else{
                step.classList.remove('active');
                form_steps[i].classList.remove('active');
            }
    });
    
    if(active === 1) {
        prevButton.disabled = true;
    
    } else if (active === steps.length) {
        nextButton.disabled = true;
    }else{
        prevButton.disabled = false;
        nextButton.disabled = false;
    }
    
    
    
    }    


    