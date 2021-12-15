            function preloader(){setTimeout(() => {$('#preloader').addClass('hide');}, 20000);}
            $(document).ajaxStart(function(){$('#preloader').removeClass('hide');preloader();});
            $(document).ajaxComplete(function(){$('#preloader').addClass('hide');});
            $(document).ajaxSuccess(function(){$('#preloader').addClass('hide');});
            $(document).ajaxError(function(){console.log("AJAX error");
                $('#preloader').addClass('hide');
                $.alert('Theres A Network Issue. Please Retry Later','NeonCafe');
            });
