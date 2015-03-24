var getWeightReam = function() {
    var grade = $('.form-control[name=grade_gram]').val();
    var size = $('.form-control[name=size]').val();
    if (grade == 'PPC-64' && size == 'A3') {
        return 3.99;
    } else if (grade == 'PPC-64' && size == 'A4') {
        return 2.00;
    } else if (grade == 'PPC-64' && size == 'B4') {
        return 2.99;
    } else if (grade == 'PPC-64' && size == 'B5') {
        return 1.5;
    } else if (grade == 'PPC-70' && size == 'A3') {
        return 4.37;
    } else if (grade == 'PPC-70' && size == 'A4') {
        return 2.18;
    } else if (grade == 'PPC-70' && size == 'B4') {
        return 3.27;
    } else if (grade == 'PPC-70' && size == 'B5') {
        return 1.64;
    } else if (grade == 'PPC-75' && size == 'A3') {
        return 4.68;
    } else if (grade == 'PPC-75' && size == 'A4') {
        return 2.34;
    } else if (grade == 'PPC-75' && size == 'B4') {
        return 3.51;
    } else if (grade == 'PPC-75' && size == 'B5') {
        return 1.75;
    } else if (grade == 'PPC-80' && size == 'A3') {
        return 4.99;
    } else if (grade == 'PPC-80' && size == 'A4') {
        return 2.50;
    } else if (grade == 'PPC-80' && size == 'B4') {
        return 3.74;
    } else if (grade == 'PPC-80' && size == 'B5') {
        return 1.87;
    }

}
var calcutaleOutput = function() {
    return weight * total_ream();
}
var setOutPut = function() {
    var weight = getWeightReam();
    var total_ream = $('input[name=total_ream]').val();
    $('input[name=output_weight]').val(parseFloat(weight * total_ream));
}
var setInPut = function() { 
    var input = parseFloat($('input[name=roll_weight1]').val()) + parseFloat($('input[name=roll_weight2]').val()) + parseFloat($('input[name=roll_weight3]').val()) + parseFloat($('input[name=roll_weight4]').val()) + parseFloat($('input[name=roll_weight5]').val());
    $('input[name=input_weight]').val(parseFloat(input));
}
$('input[name^=roll_weight]').on('keyup', function() {
    var total = 0;
    $('input[name^=roll_weight]').each(function() {
        total += (parseInt($(this).val()) || 0);
    });
    $('input[name=input_weight]').val(total);
});
$('input[name=input_weight],input[name=output_weight]').on('change', function() {
    var value = $('input[name=input_weight]').val() - $('input[name=output_weight]').val();
    $('input[name=total_reject]').val(value);
});

$('input[name=roll_width],input[name=input_weight]').on('change', function() {
    var value = $('input[name=roll_width]').val() - (($('input[name=roll_width]').val() - 40) / $('input[name=roll_width]').val()) * $('input[name=input_weight]').val();
    $('input[name=problem_a]').val(value);
});

//=============Folio=========================

