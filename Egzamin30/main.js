calculateMothlyInstallment = () => {
    const reactCourse = document.getElementById("react-course").checked;
    const javascriptCourse = document.getElementById("javascript-course").checked;
    const numberOfInstallments = document.getElementById("number-of-installment").value;
    const city = document.getElementById("city").value;
    const result = document.getElementById("result");

    let overallAmount = 0;
    let installmentMonthlyAmount = 0;

    if (reactCourse && javascriptCourse) {
        overallAmount = 8000;
    } else if (reactCourse) {
        overallAmount = 5000;
    } else if (javascriptCourse) {
        overallAmount = 3000;
    }
    
    installmentMonthlyAmount = overallAmount / numberOfInstallments;
    result.innerText = `Kurs odbędzie się w ${city}. Koszt całkowity: ${overallAmount}. Płacisz ${numberOfInstallments} rat po ${installmentMonthlyAmount} zł`;
}