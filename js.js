$( document ).ready(function() {
    var months = $('#Months');
    var matrix = $('#matrix');
    var week = $('#week');
    var masiv = [];
    var day;
    var weekName = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    for (var h = 0; h < 7; h++){
        week.append('<div class="week">'+weekName[h]+'</div>');
    }
    var start = '';
    $.ajax({
        type: 'GET',
        url: 'date.php',
        data: {
            start: start
        }
    }).done(function (response) {
        masiv = response.split(',');
        console.log(masiv);
        months.append(masiv[2]);
        day = parseInt(masiv[3]);
        matrix.append(masiv[1]);
        $('#matr'+day+'').css('color', 'red');
        $('#week div').slice(-2).addClass("special");
        $('.divs1 div').slice(-2).addClass("special");
        $('.divs2 div').slice(-2).addClass("special");
        $('.divs3 div').slice(-2).addClass("special");
        $('.divs4 div').slice(-2).addClass("special");
        $('.divs5 div').slice(-2).addClass("special");
        $('.divs6 div').slice(-2).addClass("special");
        var nextear = parseInt(masiv[2]);
        var count = masiv[4];
        var asdf = parseInt(count);
        $('.next').on('click', function () {
            asdf += 1;
            if (asdf > 12){
                nextear += 1;
                asdf = 1;
            }
            $.ajax({
                type: 'GET',
                url: 'date.php',
                data: {
                    next: asdf,
                    nextyear: nextear
                }
            }).done(function (event) {
                masiv = [];
                masiv = event.split(',');
                months.html(masiv[2]);
                matrix.html(masiv[1]);
                $('.divs1 div').slice(-2).addClass("special");
                $('.divs2 div').slice(-2).addClass("special");
                $('.divs3 div').slice(-2).addClass("special");
                $('.divs4 div').slice(-2).addClass("special");
                $('.divs5 div').slice(-2).addClass("special");
                $('.divs6 div').slice(-2).addClass("special");

            });
        });
        $('.prev').on('click', function () {
            asdf -=1;
            if(asdf == 0){
                nextear -= 1;
                asdf = 12;
            }
            $.ajax({
                type: 'GET',
                url: 'date.php',
                data: {
                    prev: asdf,
                    prevyear: nextear
                }
            }).done(function (event) {
                masiv = [];
                masiv = event.split(',');
                months.html(masiv[2]);
                matrix.html(masiv[1]);
                $('.divs1 div').slice(-2).addClass("special");
                $('.divs2 div').slice(-2).addClass("special");
                $('.divs3 div').slice(-2).addClass("special");
                $('.divs4 div').slice(-2).addClass("special");
                $('.divs5 div').slice(-2).addClass("special");
                $('.divs6 div').slice(-2).addClass("special");

            })
        });
    })
});