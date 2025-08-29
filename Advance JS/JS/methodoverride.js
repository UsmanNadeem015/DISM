class Parent{
    constructor(){
        console.log('This is a parent constructor')
    };

    sayHello(){
        console.log('Parent says hello world');
    };
};

class Child extends Parent{
    constructor(){
        super(console.log(object))
        console.log('This is a child constructor')
    };

    sayHello(){
        console.log('Child says hello world');
    };
};

const father = new Parent();
const son = new Child();
