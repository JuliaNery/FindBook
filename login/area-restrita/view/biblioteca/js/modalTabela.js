// SCRIPTS PARA OS MODAIS DA TABELA


// modal excluir
let preveiwContainer = document.querySelector('.products-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');

document.querySelectorAll('.button3').forEach(button3 =>{
  button3.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = button3.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('activeModal');
      }
    });
  };
});

previewBox.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
  };
});



// MODAL DISPONIVEL
let preveiwContainer1 = document.querySelector('.products-preview1');
let previewBox1 = preveiwContainer1.querySelectorAll('.preview1');

document.querySelectorAll('.button6').forEach(product =>{
  product.onclick = () =>{
    preveiwContainer1.style.display = 'flex';
    let name1 = product.getAttribute('data-name1');
    previewBox1.forEach(preview =>{
      let target1 = preview.getAttribute('data-target1');
      if(name1 == target1){
        preview.classList.add('activeModal1');
      }
    });
  };
});

previewBox1.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer1.style.display = 'none';
  };
});