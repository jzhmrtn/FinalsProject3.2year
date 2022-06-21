window.onload=function(){

    const modalAdd = document.querySelector('#addMdl');
    const openAddModal = document.querySelector('.addBtn');
    const modalEdit = document.querySelector('#editMdl');
    const openEditModal = document.querySelector('.editBtn');
    const nxtEdit = document.querySelector('.btnNext');
    var pg1 = document.querySelector('#page1');
    var pg2 = document.querySelector('#page2');
    
    openAddModal.addEventListener('click', () => {
      modalAdd.showModal();
    })

    openEditModal.addEventListener('click', () => {
      modalEdit.showModal();
    })
    
    nxtEdit.addEventListener('click', () => {
      pg1.style.display='none';
      pg2.style.display='flex';

    })

  }

  function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}

