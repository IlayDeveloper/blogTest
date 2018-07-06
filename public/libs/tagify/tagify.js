
(function(){
    var tags = $('#tags')[0];
    var categories = $("#categories")[0];

    var tagify = new Tagify(tags, {
        whitelist : [],
        blacklist : [],
        enforceWhitelist : false,
        autocomplete: true,
        suggestionsMinChars:1,
        dropdown : {
            classname : "color-blue",
            enabled   : 1,
            maxItems  : 5
        }
    });

    var tagify2 = new Tagify(categories, {
        whitelist : [],
        suggestionsMinChars:1,
        autocomplete: true,
        enforceWhitelist : true,
    });
})();


