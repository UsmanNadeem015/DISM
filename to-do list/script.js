const input = document.getElementById('input');
const btn = document.getElementById('btn');
const result = document.getElementById('resultList');

// Empty array where data will go
let todoList = [];

btn.addEventListener("click", () =>{
const todo = new Todo(input.value , "- ");
todoList = [...todoList, todo];
UI.displayData(todoList);
console.log(todoList)

input.value = "";

});

class Todo{
    constructor(todo, type){
        this.todo = todo,
        this.type = type;
    };
};

class UI {
    static displayData(todoList) {
        result.innerHTML = todoList.map(item => `
            <div>${item.type} ${item.todo}</div>`)
    }
}
