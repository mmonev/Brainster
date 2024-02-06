let questions = [];
let currentQuestion = 0;
let score = 0;

async function getQuestions() {
  const response = await fetch('https://opentdb.com/api.php?amount=20&type=multiple');
  const data = await response.json();
  return data.results;
}

function renderStartScreen() {
  
  const startScreen = document.getElementById('start-screen');
  startScreen.style.display = 'block';

  const startBtn = document.getElementById('start-btn');
  startBtn.addEventListener('click', startQuiz);

  const resultScreen = document.getElementById('result-screen');
  resultScreen.style.display = 'none';
}

function renderQuestion(question, index) {
  const questionElement = document.getElementById('question');
  questionElement.textContent = `${index + 1}. ${question.question}`;

  const answersElement = document.getElementById('answers');
  answersElement.innerHTML = '';

  const allAnswers = [...question.incorrect_answers, question.correct_answer];
  allAnswers.sort(() => Math.random() - 0.5);

  allAnswers.forEach((answer) => {
    const answerButton = document.createElement('button');
    answerButton.classList.add('btn', 'btn-secondary', 'mr-2', 'mb-2');
    answerButton.textContent = answer;
    answerButton.addEventListener('click', () => checkAnswer(answer, question.correct_answer));
    answersElement.appendChild(answerButton);
  });

  const progressElement = document.getElementById('progress');
  progressElement.textContent = `Question ${index + 1} of 20`;
}

function startQuiz() {
  const quizScreen = document.getElementById('quiz-screen');
  quizScreen.style.display = 'block';

  const startScreen = document.getElementById('start-screen');
  startScreen.style.display = 'none';

  currentQuestion = 0;
  score = 0;
  renderQuestion(questions[currentQuestion], currentQuestion);

  const retryBtn = document.getElementById('retry-btn');
  retryBtn.style.display = 'inline-block';
  retryBtn.addEventListener('click', () => {
    location.hash = '';
    renderStartScreen();
  });
}

function checkAnswer(selectedAnswer, correctAnswer) {
  if (selectedAnswer === correctAnswer) {
    score++;
  }

  currentQuestion++;

  if (currentQuestion < questions.length) {
    location.hash = `#question-${currentQuestion + 1}`;
    renderQuestion(questions[currentQuestion], currentQuestion);
  } else {
    showResult();
  }
}

function showResult() {
  const quizScreen = document.getElementById('quiz-screen');
  quizScreen.style.display = 'none';

  const resultScreen = document.getElementById('result-screen');
  resultScreen.style.display = 'block';

  const scoreElement = document.getElementById('score');
  scoreElement.textContent = score;

  localStorage.setItem('quizScore', score);

  const tryAgainBtn = document.getElementById('try-again-btn');
  tryAgainBtn.addEventListener('click', () => {
    location.hash = '';
    renderStartScreen();
  });

  const retryBtn = document.getElementById('retry-btn');
  retryBtn.style.display = 'none';
}

function handleHashChange() {
  const hash = location.hash;
  const questionIndex = parseInt(hash.replace('#question-', ''));

  if (!isNaN(questionIndex) && questionIndex <= questions.length) {
    currentQuestion = questionIndex - 1;

    if (currentQuestion < questions.length) {
      renderQuestion(questions[currentQuestion], currentQuestion);
    } else {
      renderResultScreen();
    }
  } else {
    currentQuestion = 0;
    renderStartScreen();
  }
}

async function init() {
  questions = await getQuestions();
  renderStartScreen();
  handleHashChange();
}

window.addEventListener('hashchange', handleHashChange);

init();