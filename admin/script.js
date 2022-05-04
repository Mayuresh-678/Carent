const addcar = document.querySelector('.wrapper.add-car');
const showcar = document.querySelector('.avail-cars');
const addbtn = document.getElementById('add-btn');
const showbtn = document.getElementById('show-btn');

const availbtn = document.getElementById('show-avail');
const bookbtn = document.getElementById('show-booked');
const availcar = document.getElementById('main');
const bookcar = document.getElementById('sub');

const addmin = document.getElementById('add-admin');
const close = document.getElementById('close-popup');
const adminform = document.getElementById('add-admin-form');


showbtn.onclick = ()=>{
    addcar.style.display="none";
    showcar.style.display="block";
};
addbtn.onclick = ()=>{
    addcar.style.display="block";
    showcar.style.display="none";
};


availbtn.onclick = ()=>{
    availcar.style.display = "grid";
    bookcar.style.display = "none";
};
bookbtn.onclick = ()=>{
    availcar.style.display = "none";
    bookcar.style.display = "grid";
};

addmin.onclick = ()=>{
    adminform.style.display = "block"; 
}

close.onclick = ()=>{
    adminform.style.display = "none"; 
};