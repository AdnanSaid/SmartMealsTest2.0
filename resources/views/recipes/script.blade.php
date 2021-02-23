<script type="text/javascript">

    // add recipe row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<input type="text" placeholder="Enter ingredient">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove Recipe</button>';
        html += '</div>';


        $('#newRow').append(html);
    });

    // add method
    $("#addMethod").click(function () {
        var html = '';
        html += '<div id="inputFormMethod">';
        html += '<div class="field">';
        html += ' <textarea name="message" rows="10" cols="30" placeholder="step"></textarea>';
        html += '</div>';
        html += '<button id="removeMethod" type="button" class="btn btn-danger">Remove Step</button>';
        html += '</div>';

        $('#newMethod').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });

    // remove method
    $(document).on('click', '#removeMethod', function () {
        $(this).closest('#inputFormMethod').remove();
    });

    const slidePage = document.querySelector(".slide-page");
    const nextBtnFirst = document.querySelector(".firstNext");
    const prevBtnSec = document.querySelector(".prev-1");
    const nextBtnSec = document.querySelector(".next-1");
    const prevBtnThird = document.querySelector(".prev-2");
    const nextBtnThird = document.querySelector(".next-2");
    const prevBtnFourth = document.querySelector(".prev-3");
    const nextBtnFourth = document.querySelector(".next-3");
    const prevBtnFifth = document.querySelector(".prev-4");
    const submitBtn = document.querySelector(".submit");
    const progressText = document.querySelectorAll(".step p");
    const progressCheck = document.querySelectorAll(".step .check");
    const bullet = document.querySelectorAll(".step .bullet");
    let current = 1;

    nextBtnFirst.addEventListener("click", function(event){
        event.preventDefault();
        slidePage.style.marginLeft = "-25%";
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
    });
    nextBtnSec.addEventListener("click", function(event){
        event.preventDefault();
        slidePage.style.marginLeft = "-50%";
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
    });
    nextBtnThird.addEventListener("click", function(event){
        event.preventDefault();
        slidePage.style.marginLeft = "-75%";
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
    });

    nextBtnFourth.addEventListener("click", function(event){
        event.preventDefault();
        slidePage.style.marginLeft = "-100%";
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
    });

    prevBtnSec.addEventListener("click", function(event){
        event.preventDefault();
        slidePage.style.marginLeft = "0%";
        bullet[current - 2].classList.remove("active");
        progressCheck[current - 2].classList.remove("active");
        progressText[current - 2].classList.remove("active");
        current -= 1;
    });

    prevBtnThird.addEventListener("click", function(event){
        event.preventDefault();
        slidePage.style.marginLeft = "-25%";
        bullet[current - 2].classList.remove("active");
        progressCheck[current - 2].classList.remove("active");
        progressText[current - 2].classList.remove("active");
        current -= 1;
    });

    prevBtnFourth.addEventListener("click", function(event){
        event.preventDefault();
        slidePage.style.marginLeft = "-50%";
        bullet[current - 2].classList.remove("active");
        progressCheck[current - 2].classList.remove("active");
        progressText[current - 2].classList.remove("active");
        current -= 1;

    });

    prevBtnFifth.addEventListener("click", function(event){
        event.preventDefault();
        slidePage.style.marginLeft = "-75%";
        bullet[current - 2].classList.remove("active");
        progressCheck[current - 2].classList.remove("active");
        progressText[current - 2].classList.remove("active");
        current -= 1;

    });

    submitBtn.addEventListener("click", function(){
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
        setTimeout(function(){
            alert("Your Form Successfully Signed up");
            location.reload();
        },800);
    });

</script>
