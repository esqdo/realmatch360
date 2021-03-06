jQuery(document).ready(function($) {
	app.dict.lang="de";app.dict.tokens={"login_to_see_reports":"Um diese Reports anzusehen m\u00fcssen Sie angemeldet sein"};


	var url = window.location.href;
	var msRegionRegexp = /#msRegion-([0-9]+)/g;
	var result = msRegionRegexp.exec(url);
	if( result ) {
		var msRegionId = parseInt( result[1] );

		var e = jQuery.Event("click");
		$("area[data-msregion="+msRegionId+"]", $(".map")).trigger(e);

	}






    var mapLoadCheck = function() {

        // We need to load the map in case you are logged in and want to buy new analysis/reports!
        // But not on the start/home page!!!
        if( $("#map").is(":hidden") ) {
            if( $('.load-map-even-it-is-hidden').length == 0 ) {
                return;
            }
        }

//Load IMG
        app.ajax.post('map.loadImg', { }, function(response) {
            $("#map").html( response );

            var msRegion	= "";
            setTimeout(function() {
                $('#map .mapimg').maphilight({
                    fillColor: 'FF8330',
                    fillOpacity: 0.6,
                    strokeColor: 'FF8330'
                });
                if(msRegion) {
                    $("area[data-msregion='']","map#realmatchmap_map").trigger('click');
                }
            }, 50);
            $("#loadMask").addClass("hide");
        }, 'html' );

        mapLoadCheck = function() { };
    }

    $(window).resize( app.debounce( function() {
        mapLoadCheck();
    }, 250) );

//Login Form

        var body    = $("body");
		var wrapper = $("#pageNavigationTop");

		body.on("click", ".btn-login-ajax", function(e) {
			var button  = $(this);
			var form    = button.parents('form');
			var data    = app.form.serialize(form);

            $(".form-group", form).removeClass("has-error");
			$(".alert").addClass("hide");
			button.button('loading');

            var callbackLoginCall = function() {
				app.ajax.post('access.login', data, function(response) {
					// response handling
					if (response == 1) {

                        // save preferred user name for next time in cookie
                        // if remember me box is selected
//                        if( $(form).find('input[name="rememberMe"]').prop('checked') ) {
//                            document.cookie="usernameSuggestion="+$(form).find('input[name="username"]').val();
//                        }

						$(".form-group", form).addClass("has-success");
						var msregion	= $( "input[name='msregion']", ".popover-content" ).val();


                        var applicationPrefix = '/app/';
                        var locPath = location.pathname;

                        if(!msregion) {
                            window.location.pathname = applicationPrefix;
                        } else {
                            window.location.pathname = applicationPrefix+'?msregion='+msregion;
                        }

					} else {
						$(".form-group", form).addClass("has-error");

						if(response == 3 ) {
							$(".alert-status-3", ".login-dialog").removeClass("hide");

						} else {
							$(".alert-status-0", ".login-dialog").removeClass("hide");

							setTimeout(function() {
								$(".login-dialog").parents(".popover").effect("shake");
							}, 50);

						}
						button.button("reset");
					}
				});
			};
			setTimeout(callbackLoginCall, 500);

			app.stopPropagation(e);
			return false;
		});


		var popoverContent = $(".login-dialog", wrapper).html();
		$(".login-dialog", wrapper).remove();

		$(".btn-login", wrapper).popover({
			animation: true,
			trigger: 'click',
			html: true,
			placement: "bottom",
			title: "Login",
			content: '<div class="login-dialog">'+popoverContent+'</div>',
			container: body
		});

        $(".btn-login", wrapper).on('click', function() {

            // Looks for username cookie
//            var allCookies = document.cookie.split(';');
//            for(var i=0; i &lt; allCookies.length; i++) {
//                var cookie = allCookies[i];
//                while (cookie.charAt(0)==' ') {
//                    cookie = cookie.substring(1);
//                }
//                if (cookie.split()[0].indexOf('usernameSuggestion') != -1) {
//                    var usernameSuggestion = cookie.substring('usernameSuggestion='.length, cookie.length);
//                    $("input[name='username']").val(usernameSuggestion);
//                }
//            }

            $("input[name='username']").focus();
        });






	$(".map").on("click", "area", function(e) {



        var areaEl           = $(this);
        var msRegion         = areaEl.data("msregion");
        var msRegionProfiles = areaEl.data("msregion-profiles");
		var msRegionUsers    = areaEl.data("msregion-users");
        var msRegionTitle    = areaEl.data("msregion-title");
        var popover          = $(".popover");
//        var popover          = $("#element-to-pinup-popover-when-area-is-hidden");
//        var pinupArea        = $('#element-to-pinup-popover-when-area-is-hidden');
        var left             = 0;
        var mapWidth         = $(".mapimg").width();

        var responsive = false;
        if( $(document).width() < 768 ) {
            var responsive = true;
        }









        var calculateCenter = function(areaEl) {
            var coordsX     = [];
            var coordsY     = [];
            var coords      = $(areaEl).attr("coords").split(",");
            var countPoints = coords.length/2;

            $.each(coords, function(index, value) {
                if (index % 2 == 0) {
                    coordsX.push(parseInt(value));
                } else {
                    coordsY.push(parseInt(value));
                }
            });


            var i    = 0;
            var area = 0.0;
            while (i < countPoints-1) {
                area += (parseFloat(coordsX[i]) * parseFloat(coordsY[i+1])) - (parseFloat(coordsX[i+1]) * parseFloat(coordsY[i]));
                i++;
            }
            area /= 2;
            if (area < 0) {
                area *= -1;
            }


            var sumX = 0.0;
            var sumY = 0.0;
            i        = 0;
            while (i < countPoints-1) {
                sumX += (parseFloat(coordsX[i]) + parseFloat(coordsX[i+1])) * ((parseFloat(coordsX[i])*parseFloat(coordsY[i+1])) - (parseFloat(coordsX[i+1]) * parseFloat(coordsY[i])));
                sumY += (parseFloat(coordsY[i]) + parseFloat(coordsY[i+1])) * ((parseFloat(coordsX[i])*parseFloat(coordsY[i+1])) - (parseFloat(coordsX[i+1]) * parseFloat(coordsY[i])));
                i++;
            }
            var x  = (1/ (6*area) ) * sumX *-1;
            var y  = (1/ (6*area) ) * sumY *-1;


            return { x: x, y: y };
        };




        var calculatePrice = function() {
            var cost    = 0;


			$("input.checkbox-region:checked").each(function() {
				cost = $(this).data("price");
			});


            $("input.checkbox-city:checked").each(function() {
                var cityEl    = $(this);
                var cityRowEl = cityEl.parents('.row-city');

                var subscriptionEl    = $(".subscription-city:checked", cityRowEl);
                var subscriptionPrice = subscriptionEl.data("price");

                cost += subscriptionPrice;
            });

            $(".price-report-total").fadeOut(200).html(app.format.money(cost)).fadeIn(200);
        };




        var collectSelectedCity = function() {
            var selection = [ ];

            $("input.checkbox-city:checked").each(function() {
                var cityEl         = $(this);
                var cityRowEl      = cityEl.parents('.row-city');
                var subscriptionEl = $(".subscription-city:checked", cityRowEl);
                var selectionData  = subscriptionEl.data("selection");
                selection.push(selectionData);
            });

            return selection;
        };

		var collectSelectedRegion = function() {
			var selection = '';
			$("input.checkbox-region:checked").each(function() {
				selection  = $(this).data("selection");
			});
			return selection;
		};




        var checkLoginStatus = function() {
            app.ajax.post("subscription.checkLoginStatus", { }, function(response) {
                return response == 1;
            });
        };




        var toggleMaphilight = function(areaEl, alwaysOn) {
            var data = areaEl.data('maphilight') || { };

            data.alwaysOn    = alwaysOn;
            data.fillColor   = 'FF8330';
            data.strokeColor = 'FF8330';
            data.strokeWidth = 1;
            data.fillOpacity = 0.6;

            areaEl.data('maphilight', data).trigger('alwaysOn.maphilight');
        };








        if (popover) {
            $("area").each(function() {
                var areaEl  = $(this);
                if (areaEl.data().maphilight) {
                    toggleMaphilight(areaEl, false);
                }
            });
            popover.remove();
            popover.toggle();
        }




        toggleMaphilight(areaEl, true);




        if( responsive ) {
            var popoverContainer = '#element-to-pinup-popover-when-area-is-hidden';
        } else {
            var popoverContainer = '#map';
            var viewportContainer = '';
        }

                areaEl.popover({
            animation: true,
            trigger: 'manual',
            html: true,
            placement: "bottom",
            title: "<div class=\"popover-title-city\">"+app.dict.translate("login_to_see_reports")+"</div><span class=\"close-button close icon-close\"></span>",
            content: "<img style='margin-top: 20px;' src='http://realmatch360.com/app/static/img/spinner-small.gif'>;",
            container: popoverContainer
        });

        areaEl.popover('show');
        $(".popover-content").addClass("popover-content-temp text-center");

        $(".popover-title").addClass("popover-title-map");


        popover  = $(".popover");
        popover.addClass("popover-subscription");




        if( responsive ) {
            var position  = {
                x: $('#element-to-pinup-popover-when-area-is-hidden').offset().left,
                y: $('#element-to-pinup-popover-when-area-is-hidden').offset().top
            };
        } else {
            var position  = calculateCenter(areaEl);
        }


        if (position.x + popover.width() > mapWidth + 50) {

            left = (mapWidth - (position.x + popover.width())) * -1;

        } else {
            left = popover.width()/4;


            if (position.x - left < 0 ) {
                left = popover.width()/4 + (position.x - left - 5); // 5 = 'margin'
            }
        }

        popover.css( {
                left: position.x - left + "px",
                top: position.y + popover.height()/32 + "px"
            }
        );
        $(".arrow").css("left", left);


        app.ajax.post("subscription.regionForm", { msRegion: msRegion }, function(response) {
            $(".popover-content").removeClass("text-center").html(response).removeClass("popover-content-temp", 400);
            var btnPopover  = $(".btn-popover");
            btnPopover.addClass("disabled");

            // If user opened these popup by using the #bfh-selectbox-city selection box, we will find out the selected city to preselect and jump to it in the long list...
            var selectedCity = document.getElementById("bfh-selectbox-city").getAttribute('selected-city');
            document.getElementById("bfh-selectbox-city").setAttribute('selected-city',null); //reset it to null, so we can figure out where the next popup opening call came from.

            if(selectedCity != null) {
                var regionList = $(".popover-content > #regionList")
                var cityItem = $(regionList).find('input[value="'+selectedCity+'"]')
                if(cityItem.length > 0) {
                    var listElement = $(cityItem).closest('.row-city')
                    // now scroll to input element!
                    $(regionList).animate({ scrollTop: ($(listElement).offset().top - $('#regionList').offset().top ) }, 'slow');

                    // now check the checkbox and activate price calculation
                    setTimeout(function() {
                        (cityItem).trigger("click")
                    }, 100);
                }
            } else {
                // no city was selected via #bfh-selectbox-city selection box
            }


			popover.on("click", ".checkbox-region", function() {

				btnPopover.removeClass("disabled");
				return true;



			});

            popover.on("click", ".checkbox-city", function() {
                var checkbox = $(this);
                var parent   = checkbox.parents('.row-city');

                btnPopover.removeClass("disabled");

                if (checkbox.is(":checked")) {
                    $(".radio-city .radio-inline", parent).removeClass("invisible").hide().fadeIn(500);

                } else {
                    $(".radio-city .radio-inline", parent).addClass("invisible").show().fadeOut(250);
                }
            });




            popover.on("change", "input[type=radio]:visible", function() {
                calculatePrice();
            });

            popover.on("change", ":checkbox", function() {
                calculatePrice();
            });




            $(".btn-confirm-selection").on("click", function() {
                var button  = $(this);
                var content = $(".popover-content");
                var answer  = $("#answer").data("answer");
                button.button("loading");

				var selection = [];

				var selectionCity		= collectSelectedCity();
                var selectionMsRegion   = collectSelectedRegion();
// Wird nun direkt gekauft, ohne umweg über Confirmation-Seite
//				selection	= {
//					'cityList' :selectionCity,
//					'region' :  selectionMsRegion
//				};

                content.addClass("text-center").addClass("popover-content-temp", 400)
                       .html("<img style='margin-top: 20px;' src='http://realmatch360.com/app/static/img/spinner-small.gif'>");
// Wird nun direkt gekauft, ohne umweg über Confirmation-Seite
// ALT:
//                app.ajax.post("subscription.formModal", { selection: selection, msRegion: msRegion }, function(response) {
//                    $(".popover-title-city").html("Report-Kauf bestätigen");
//
//                    content.removeClass("text-center").html(response).removeClass("popover-content-temp", 400);
//                    $(".btn-confirm-purchase").addClass("disabled");
//
//                    accept AGB handling
//                    $("body").on("click", "#agb", function() {
//                        if ($(this).is(":checked")) {
//                            $(".btn-confirm-purchase").removeClass("disabled");
//                        } else {
//                            $(".btn-confirm-purchase").addClass("disabled");
//                        }
//                    });
//                }, "html"); ajax end

// Wird nun direkt gekauft, ohne umweg über Confirmation-Seite
// NEU:
                app.ajax.post("subscription.purchase", {
                    selection: {
                        cityList 	: selectionCity,
                        region		: selectionMsRegion
                    }
                }, function(response) {
                    if (response ) {
                        $(".popover-content").addClass("text-center").html("<h3 style=\"color: rgb(6, 91, 96);\">"+answer+">/h3>").fadeIn(500);

                        setTimeout(function() {
                            $(".popover").remove();

                            switch(response) {
                                case '_msregion_':
                                case '"_msregion_"':
                                    window.location.replace("report-msregion.html");
                                    break;

                                default:
                                    window.location.replace("report-city.html#city-"+response);
                                    break;
                            }
                        }, 2000);
                    }
                }, "html");

            });
        }, "html");

        $(".popover-title").css("position", "relative");


        $(".close-button").on("click", function() {
            toggleMaphilight(areaEl, false);
            popover.remove();
         });
    });
});
