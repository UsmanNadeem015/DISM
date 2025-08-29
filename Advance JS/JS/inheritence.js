console.log("Inheritence in JS")
console.log("__________________________________________________________")

class Parent{
    constructor(){
        console.log('This is a parent constructor')
    };

    salary(a){
        this.a = a;
        console.log(`parent has a slaray of ${a}`);
    };
};

class Child extends Parent {
    // constructor(){
    //     console.log('This is a child constructor')
    // };

    study(){
        console.log('Child has to study');
    };
};

const father = new Parent();
father.salary(500)

console.log("_________________________________________________________")

const son = new Child();
son.study();
son.salary(100);

