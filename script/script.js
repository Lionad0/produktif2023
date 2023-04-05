const addData = document.querySelector('.show-form');
const form = document.querySelector('.form');
const remove = document.querySelector('.remove');
const container = document.querySelector('.dahlah');

addData.addEventListener('click', function(){
    form.classList.add('pop-down');
    container.classList.add('overlay');
})

remove.addEventListener('click', function(e){
    form.classList.remove('pop-down');
    container.classList.remove('overlay');

})
