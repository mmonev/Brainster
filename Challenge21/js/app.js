let budBtn = document.getElementById('budget-form');
budBtn.addEventListener('submit', function(e) {
    e.preventDefault();

    let budIm = document.getElementById('budget-input');
    let bud = document.getElementById('budget-amount');
    if (budIm.value == '' || budIm.value < 0) {
        let alerts = document.getElementsByClassName('my-3');
        let redAl = document.createElement('div');
        redAl.innerHTML = "Value Can Not Be Empty or Negaive";
        redAl.setAttribute('id', 'alertDiv');
        redAl.style.backgroundColor = 'rgb(185, 142, 147)';
        redAl.style.color = "black";
        redAl.style.padding = "10px";
        redAl.style.marginBottom = '10px';
        alerts[0].insertBefore(redAl, alerts[0].childNodes[0]);
        $("#alertDiv").fadeOut(3000);
        console.log(alerts[0]);
    } else if (budIm.value > 0) {
        bud.innerHTML = budIm.value;
        bud = parseInt(bud);
        let spans = document.querySelectorAll('span');

    } else {
        let warning = document.createElement('div');
        warning.innerHTML = "Value can not be empty or negative";
        warning.style.backgroundColor = "red";
        let parents = document.getElementsByClassName('my-3');
    }
    budIm.value = '';
    let bal = document.getElementById('balance-amount');
    let exp = parseInt(document.getElementById('expense-amount').innerHTML);
    let budg = parseInt(document.getElementById('budget-amount').innerHTML);
    bal.innerHTML = budg - exp;
    console.log(budg);
    console.log(exp);
});
function addDiv() {
    let div4 = this.document.getElementsByClassName('my-3');
    div4[3].innerHTML = '<div><span style="padding:0px 30px 0px 70px; font-weight:bold;">Expense Title</span><span style="padding:0px 20px 0px 30px; font-weight:bold;">Expense Value</span></div><table id="tb"><thead id="th"></thead><tbody id="tbody"></tbody></table>';
    document.getElementById('tb').style.width = "100%";
    document.getElementById('tb').style.textAlign = "center";
}
addDiv();
let editIndex = 0;
let arr = [];

function addExpense() {
    let table = document.getElementById('tbody');
    let tableRow = table.insertRow();
    let cell1 = tableRow.insertCell(0);
    let cell2 = tableRow.insertCell(1);
    let cell3 = tableRow.insertCell(2);

    let expense = document.getElementById('expense-input');
    let amount = document.getElementById('amount-input');
    cell1.innerHTML = '-' + expense.value;
    let amm = amount.value
    amm = parseInt(amm);
    cell2.innerHTML = amm;
    cell1.style.color = "red";
    cell2.style.color = "red";
    cell1.style.fontWeight = "bold";
    cell2.style.fontWeight = "bold";
    arr.push(amount.value);
    let editBt = document.createElement('i');
    editBt.setAttribute('id', 'edit_' + arr.length);
    editBt.setAttribute('class', 'fas fa-edit');
    editBt.style.color = "blue";
    editBt.style.padding = "0px 10px";

    cell3.appendChild(editBt)
    editBt.addEventListener('click', function() {
            editIndex = this.parentNode.parentNode.rowIndex + 1;
            let productName = this.parentNode.parentNode.firstChild.innerHTML;
            expense.value = productName;
            let amountName = this.parentNode.parentNode.firstChild.nextSibling.innerHTML;
            amount.value = amountName;
        })
    let delBt = document.createElement('i');
    delBt.setAttribute('id', 'delete_' + arr.length);
    delBt.setAttribute('class', 'fas fa-trash-alt');
    delBt.style.color = "red";
    cell3.appendChild(delBt)
    delBt.style.padding = "0px 10px";

    delBt.addEventListener('click', function() {
        let bid = this.parentNode.parentNode.rowIndex;
        arr.splice(bid, 1);
        let arrSum = arr.reduce(function(a, b) {
            return parseInt(a) + parseInt(b);
        }, 0);
        let exp = document.getElementById('expense-amount');
        exp.innerHTML = arrSum;
        let bal = document.getElementById('balance-amount');
        let budg = parseInt(document.getElementById('budget-amount').innerHTML);
        bal.innerHTML = budg - arrSum;
        this.parentNode.parentNode.remove();


    })
    expense.value = '';
    amount.value = '';
    let arrSum = arr.reduce(function(a, b) {
        return parseInt(a) + parseInt(b);
    }, 0);
    let expenses = document.getElementById('expense-amount');
    expenses.innerHTML = parseInt(arrSum);
    let sum = document.getElementById('balance-amount');

    let bal = document.getElementById('balance-amount');
    let exp = parseInt(document.getElementById('expense-amount').innerHTML);
    let budg = parseInt(document.getElementById('budget-amount').innerHTML);
    bal.innerHTML = budg - exp;
};
function editRow() {
    document.getElementById('tbody').rows[editIndex - 1].cells[0].innerHTML = document.getElementById('expense-input').value;
    document.getElementById('tbody').rows[editIndex - 1].cells[1].innerHTML = document.getElementById('amount-input').value;
    let bid = editIndex - 1;
    arr.splice(bid, 1, document.getElementById('amount-input').value);
    let arrSum = arr.reduce(function(a, b, ) {
        return parseInt(a) + parseInt(b);
    }, 0);
    let expenses = document.getElementById('expense-amount');
    expenses.innerHTML = parseInt(arrSum);
    let sum = document.getElementById('balance-amount');

    let bal = document.getElementById('balance-amount');
    let exp = parseInt(document.getElementById('expense-amount').innerHTML);
    let budg = parseInt(document.getElementById('budget-amount').innerHTML);
    bal.innerHTML = budg - exp;
    editIndex = 0;

    document.getElementById('expense-input').value = '';
    document.getElementById('amount-input').value = '';
}
let expBut = document.getElementById('expense-submit');
expBut.addEventListener('click', function(e) {
    e.preventDefault();
    if (editIndex < 1) {
        addExpense();
    } else {
        editRow()
    }
});