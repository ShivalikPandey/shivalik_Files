
/*
document.getElementById('button').addEventListener("click",function () {
    form.innerHTML="<p>ok</p>"
});*/



/*let click_count = 0;

document.getElementById("form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission
});

        document.getElementById("button").addEventListener("click", function () {
            let form = document.getElementById("form");

            if (click_count === 0) {
                form.innerHTML = "<div><form id='form1'><label id='label1'>Password</label><input type='text' class='details'><div><input type='button' value='Next' class='buttoncl' id='button1'></div></form></div>";

                document.getElementById("button1").addEventListener("click", function () {
                    form.innerHTML = "<div><form id='form2'><label id='label2'>Number</label><input type='number' class='details'><div><input type='button' value='Next' class='buttoncl' id='button2'></div></form></div>";

                    document.getElementById("button2").addEventListener("click", function () {
                        form.innerHTML = "<div><form id='form3'><label id='label3'>Date of birth</label><input type='date' class='details'><div><input type='button' value='Next' class='buttoncl' id='button3'></div></form></div>";

                        document.getElementById("button3").addEventListener("click", function () {
                            form.innerHTML = "<div><form id='form4'><label id='label4'>Email</label><input type='email' class='details'><div><input type='button' value='Next' class='buttoncl' id='button4'></div></form></div>";
                        });
                    });
                });
            }

            click_count = (click_count + 1) % 2;
        });

*/


/*let click_count = 0;
let first=0;
document.getElementById("form").addEventListener("submit", function (event) {
    null;
});

document.getElementById("button").addEventListener("submit", function () {
    let form = document.getElementById("form");

    if (click_count === 0 and first===0) {
        form.innerHTML = "<div><form id='form1' action='signup.php' method='post'><label id='label1'>Password</label><input type='text' class='details'><div><input type='button' value='Next' class='buttoncl' id='button1'></div></form></div>";
        let first=first+1;
       else if(){} 
        document.getElementById("button1").addEventListener("submit", function () {
            form.innerHTML = "<div><form id='form2' action='signup.php' method='post'><label id='label2'>Number</label><input type='number' class='details'><div><input type='button' value='Next' class='buttoncl' id='button2'></div></form></div>";

            document.getElementById("button2").addEventListener("submit", function () {
                form.innerHTML = "<div><form id='form3' action='signup.php' method='post'><label id='label3'>Date of birth</label><input type='date' class='details'><div><input type='button' value='Next' class='buttoncl' id='button3'></div></form></div>";

                document.getElementById("button3").addEventListener("submit", function () {
                    form.innerHTML = "<div><form id='form4' action='signup.php' method='post'><label id='label4'>Email</label><input type='email' class='details'><div><input type='button' value='Next' class='buttoncl' id='button4'></div></form></div>";
                });
            });
        });
    }

    click_count = (click_count + 1) % 2;
        });*/


/*let click_count = 0;

        document.getElementById("button").addEventListener("click", function () {
            let form = document.getElementById("form");

            if (click_count === 0) {
                form.innerHTML = "<div><form id='form1'><label id='label1'>Password</label><input type='text' class='details'><div><input type='button' value='Next' class='buttoncl' id='button1'></div></form></div>";

              
                document.getElementById("button1").addEventListener("click", function () {
                    form.innerHTML = "<div><form id='form2'><label id='label2'>Number</label><input type='number' class='details'><div><input type='button' value='Next' class='buttoncl' id='button2'></div></form></div>";
                       
                     
                    });
                });
            }

            click_count = (click_count + 1) % 2; 
        });*/
/*  document.getElementById("button3").addEventListener("click", function () {
                            form.innerHTML = "<div><form id='form4'><label id='label4'>Email</label><input type='email' class='details'><div><input type='button' value='Next' class='buttoncl' id='button4'></div></form></div>";*/ 
/*let click_count=0;
if(click_count===0){
document.getElementById("button").addEventListener("click",clicked);
let body=document.getElementById("form");
function clicked(){
    body.innerHTML="<div><form id='form1'><label id='label1'>Password</label><input type='text' class='details'><div><input type='submit'  value='Next' class='buttoncl' id='button1'></div></form></div>";
    click_count=click_count+1;
}
}
document.getElementById("button").addEventListener("click",clickedok);

let body1=document.getElementById("form");
function clickedok(){
    body1.innerHTML="<div><form id='form2'><label id='label2'>Number</label><input type='text' class='details'><div><input type='submit'  value='Next' class='buttoncl' id='button2'></div></form></div>";
}
click_count=click_count+1;
document.getElementById("button1").addEventListener("click",clicked1);
let body1=document.getElementById("form1");
function clicked(){
    body1.innerHTML="<div id='body2'><form id='form2'><label>Number</label><input type='text' class='details'><div><input type='submit' value='Next' class='buttoncl' id='button2'></div></form></div>";
}


document.getElementById("form").addEventListener("submit",click);
function click(event){
    event.preventDefault();
    document.getElementById("label").innerText="Number";
    setTimeout(function(){document.getElementById("form").submit();},5000);
};

document.innerHTML="<div id='body'><form id="form"><label>Number</label><input type='text' class='details'><div><input type='submit'  value='Next' class='buttoncl' id='button'></div></form></div>"; */