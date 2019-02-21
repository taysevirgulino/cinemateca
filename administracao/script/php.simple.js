function strip_tags(str, allowed_tags) {   
    // Strips HTML and PHP tags from a string     
    //    
    // version: 810.1317   
    // discuss at: http://kevin.vanzonneveld.net/techblog/article/javascript_equivalent_for_phps_strip_tags   
  
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)   
    // +   improved by: Luke Godfrey   
    // +      input by: Pul   
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)   
    // +   bugfixed by: Onno Marsman   
    // *     example 1: strip_tags('<p>Kevin</p> <br /><b>van</b> <i>Zonneveld</i>', '<i>,<b>');   
    // *     returns 1: 'Kevin <b>van</b> <i>Zonneveld</i>'   
    // *     example 2: strip_tags('<p>Kevin <img src="someimage.png" onmouseover="someFunction()">van <i>Zonneveld</i></p>', '<p>');   
    // *     returns 2: '<p>Kevin van Zonneveld</p>'   
    // *     example 3: strip_tags("<a href='http://kevin.vanzonneveld.net'>Kevin van Zonneveld</a>", "<a>");   
    // *     returns 3: '<a href='http://kevin.vanzonneveld.net'>Kevin van Zonneveld</a>'   
    var key = '', tag = '', allowed = false;   
    var matches = allowed_array = [];   
    var allowed_keys = {};   
  
    var replacer = function(search, replace, str) {   
        var tmp_arr = [];   
        tmp_arr = str.split(search);   
        return tmp_arr.join(replace);   
    };   
  
    // Build allowes tags associative array   
    if (allowed_tags) {   
        allowed_tags  = allowed_tags.replace(/[^a-zA-Z,]+/g, '');;   
        allowed_array = allowed_tags.split(',');   
    }   
  
    str += '';   
  
    // Match tags   
    matches = str.match(/(<\/?[^>]+>)/gi);   
  
    // Go through all HTML tags   
    for (key in matches) {   
        if (isNaN(key)) {   
            // IE7 Hack   
            continue;   
        }   
  
        // Save HTML tag   
        html = matches[key].toString();   
  
        // Is tag not in allowed list? Remove from str!   
        allowed = false;   
  
        // Go through all allowed tags   
        for (k in allowed_array) {   
            // Init   
            allowed_tag = allowed_array[k];   
            i = -1;   
  
            if (i != 0) { i = html.toLowerCase().indexOf('<'+allowed_tag+'>');}   
            if (i != 0) { i = html.toLowerCase().indexOf('<'+allowed_tag+' ');}   
            if (i != 0) { i = html.toLowerCase().indexOf('</'+allowed_tag)   ;}   
  
            // Determine   
            if (i == 0) {   
                allowed = true;   
                break;   
            }   
        }   
  
        if (!allowed) {   
            str = replacer(html, "", str); // Custom replace. No regexing   
        }   
    }   
  
    return str;   
}

function trim (str, charlist) {   
    // Strips whitespace from the beginning and end of a string     
    //    
    // version: 812.316   
    // discuss at: http://kevin.vanzonneveld.net/techblog/article/javascript_equivalent_for_phps_trim   
  
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)   
    // +   improved by: mdsjack (http://www.mdsjack.bo.it)   
    // +   improved by: Alexander Ermolaev (http://snippets.dzone.com/user/AlexanderErmolaev)   
    // +      input by: Erkekjetter   
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)   
    // +      input by: DxGx   
    // +   improved by: Steven Levithan (http://blog.stevenlevithan.com)   
    // +    tweaked by: Jack   
    // +   bugfixed by: Onno Marsman   
    // *     example 1: trim('    Kevin van Zonneveld    ');   
    // *     returns 1: 'Kevin van Zonneveld'   
    // *     example 2: trim('Hello World', 'Hdle');   
    // *     returns 2: 'o Wor'   
    // *     example 3: trim(16, 1);   
    // *     returns 3: 6   
    var whitespace, l = 0, i = 0;   
    str += '';   
       
    if (!charlist) {   
        // default list   
        whitespace = " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";   
    } else {   
        // preg_quote custom list   
        charlist += '';   
        whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '\$1');   
    }   
       
    l = str.length;   
    for (i = 0; i < l; i++) {   
        if (whitespace.indexOf(str.charAt(i)) === -1) {   
            str = str.substring(i);   
            break;   
        }   
    }   
       
    l = str.length;   
    for (i = l - 1; i >= 0; i--) {   
        if (whitespace.indexOf(str.charAt(i)) === -1) {   
            str = str.substring(0, i + 1);   
            break;   
        }   
    }   
       
    return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';   
}