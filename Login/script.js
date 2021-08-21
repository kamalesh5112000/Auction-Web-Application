// getting all required elements
const inputBox = document.querySelector(".inputField input");
const addBtn = document.querySelector(".inputField button");
const todoList = document.querySelector(".todoList");
const deleteAllBtn = document.querySelector(".footer button");

showTasks(); //calling showTask function

function showTasks(){
  
  let getsessionStorageData=sessionStorage.getItem("New Todo"); //getting localstorage
  if(getsessionStorageData ==null)
  {
    listArraysess = [];
  }else{
    listArraysess = JSON.parse(getsessionStorageData);
  }
  const pendingTasksNumb = document.querySelector(".pendingTasks");
  pendingTasksNumb.textContent = listArraysess.length;
  let newLiTagses = "";
  listArraysess.forEach((element, index) => {
    newLiTagses += `<li>${element}<span class="icon" onclick="deleteTask(${index})"><i class="fas fa-trash"></i></span></li>`;
  });
  todoList.innerHTML = newLiTagses;
}
