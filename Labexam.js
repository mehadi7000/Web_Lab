const articleData = {
  1: { comments: [], ratings: [] },
  2: { comments: [], ratings: [] }
};

document.querySelectorAll(".article").forEach(article => {
  const articleId = article.getAttribute("data-article");

  const form = article.querySelector(".comment-form");
  const nameField = article.querySelector(".name");
  const emailField = article.querySelector(".email");
  const commentField = article.querySelector(".comment");
  const stars = article.querySelectorAll(".stars span");
  const commentsList = article.querySelector(".comments-list");

  let selectedRating = 0;


  stars.forEach(star => {
    star.addEventListener("click", () => {
      selectedRating = parseInt(star.dataset.value);

      stars.forEach(s => s.classList.remove("active"));
      for (let i = 0; i < selectedRating; i++) stars[i].classList.add("active");
    });
  });


  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const name = nameField.value.trim();
    const email = emailField.value.trim();
    const text = commentField.value.trim();


    if (name.length < 2 || name.length > 50) {
      alert("Name should be between 2 and 50 characters");
      return;
    }
    if (email && !email.includes("@")) {
      alert("Please enter a valid email address");
      return;
    }
    if (text.length < 10 || text.length > 500) {
      alert("Comment should be between 10 and 500 characters");
      return;
    }


    articleData[articleId].comments.push({ name, email, text, rating: selectedRating });
    if (selectedRating > 0) articleData[articleId].ratings.push(selectedRating);

  
    nameField.value = "";
    emailField.value = "";
    commentField.value = "";
    selectedRating = 0;
    stars.forEach(s => s.classList.remove("active"));

    updateUI(article, articleId);
  });
});


function updateUI(article, id) {
  const list = article.querySelector(".comments-list");
  const total = article.querySelector(".total-comments");
  const avg = article.querySelector(".average-rating");

  list.innerHTML = "";

  articleData[id].comments.forEach(c => {
    const li = document.createElement("li");
    li.innerHTML = `
      <strong>${c.name}</strong> ${c.email ? "(" + c.email + ")" : ""} <br>
      ${c.text}<br>
      ${c.rating ? "Rating: " + "★".repeat(c.rating) : ""}
    `;
    list.appendChild(li);
  });

  total.textContent = "Total Comments: " + articleData[id].comments.length;

  let ratingArray = articleData[id].ratings;
  let avgRating = ratingArray.length
    ? (ratingArray.reduce((a, b) => a + b, 0) / ratingArray.length).toFixed(1)
    : 0;

  avg.textContent = "Average Rating: " + avgRating;
}
