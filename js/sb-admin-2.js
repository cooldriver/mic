//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});

$(document).ready(function() {
    
    // Default view
    Container.load_main('dashboard');
    
    // Handles link loading containers
    $(document).on('click',  'a.ajax', function(e) {
        e.preventDefault();
        
        Container.load_main($(this).attr('href'));
        
    });
    
});

// Containers handling
var Container = {
    
    // Loads the main container
    load_main : function (name) {
        $.getJSON( BASE_URL + 'container_main_' + name, {} )
        .done(function(json) {
            
            // Updates main container
            $('#page-wrapper').html(json.html);
            // Sets the name of the current element
            $('#page-wrapper').data('name', name);
            
            // Check if sidebar is up to date
            if ($('#page-sidebar').data('name') != json.require_sb) {
                Container.load_sidebar(json.require_sb);
            }
        })
        .fail(function(jqxhr, textStatus, error) {
          console.log('Request failed');
        });
    },
    
    // Loads the sidebar container
    load_sidebar : function (name) {
        $.getJSON( BASE_URL + 'container_sidebar_' + name, {} )
        .done(function(json) {
            
            // Updates sidebar container
            $('#page-sidebar').html(json.html);
            // Sets the name of the div
            $('#page-sidebar').data('name', name);
            // Selects the correct element in menu
            var current_element = $('#side-menu a[href="' + $('#page-wrapper').data('name') + '"]');
            current_element.addClass('active');
            current_element.parents('li').addClass('active');
            // Side-menu initialization
            $('#side-menu').metisMenu();
            
        })
        .fail(function(jqxhr, textStatus, error) {
          console.log('Request failed');
        });
    }
    
};