window.onload = function load() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var meals = JSON.parse(this.responseText);
            var table = document.getElementById("data");
            for (mealidx in meals) {
                var row = table.insertRow(1);

                var meal = row.insertCell(0);
                var location = row.insertCell(1);
                var rating = row.insertCell(2);
                var review = row.insertCell(3);
                var date = row.insertCell(4);

                meal.innerHTML = meals[mealidx].meal;
                location.innerHTML = meals[mealidx].location;
                rating.innerHTML = meals[mealidx].rating;
                review.innerHTML = meals[mealidx].review;
                date.innerHTML = meals[mealidx].date;
            }
        }
    };
    xmlhttp.open("GET", "getmeals.php", true);
    xmlhttp.send();
}