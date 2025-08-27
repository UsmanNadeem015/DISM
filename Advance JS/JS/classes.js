// class Usman{
//     feeStatus(){
//         alert('Fees not payed');
//     }
// }

// const usman = new Usman();
// usman.feeStatus(); 

class Accstatus{
    clear(name){
        this.name = name;
        console.log(`${this.name} is clear`);
    }

    violation(name){
        this.name = name;
        console.log(`${this.name} has some violations`);
    }

    banned(name){
        this.name = name;
        console.log(`${this.name} is banned from the platform`);
    }

}

const usman = new Accstatus();
const essa = new Accstatus();
const taha = new Accstatus();
const junaid = new Accstatus();

usman.clear('Usman Nadeem');
essa.banned('Essa Kamran');
taha.violation('Taha Sajid');
junaid.clear('Junaid Chingari');

