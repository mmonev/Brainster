  const number1 = 13;
  const number2 = 15;
  const number3 = 20;

function isPrime(number) {
    if (number <= 1) {
      return false;
    }
  
    for (let i = 2; i <= Math.sqrt(number); i++) {
      if (number % i === 0) {
        return false;
      }
    }
  
    return true;
  }
  
  function findAndCheckPrime(number1, number2, number3) {
    const smallest = Math.min(number1, number2, number3);
    const largest = Math.max(number1, number2, number3);
  
    console.log("Smallest - " + smallest + " Largest - " + largest);
  
    if (isPrime(smallest)) {
      console.log("The smallest number " + smallest + " is prime.");
    } else {
      console.log("The smallest number " + smallest + " is not prime.");
    }
  
    if (isPrime(largest)) {
      console.log("The largest number " + largest + " is prime.");
    } else {
      console.log("The largest number " + largest + " is not prime.");
    }
  }
  
  findAndCheckPrime(number1, number2, number3);
  