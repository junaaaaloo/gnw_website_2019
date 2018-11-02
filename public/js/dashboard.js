$(document).ready(function() {
	$("#org").easyAutocomplete({
	    data: organizations,
	    getValue: function(element) {
	        return element.organization;
	    },
	    list: {
	        match: {
	            enabled: true
	        },
	        sort: {
	            enabled: true
	        }
	    },
	    adjustWidth: false
	});

	$("#college").easyAutocomplete({
	    data: colleges,
	    getValue: function(element) {
	        return element.college;
	    },
	    list: {
	        match: {
	            enabled: true
	        },
	        sort: {
	            enabled: true
	        }
	    },
	    adjustWidth: false
	});

	$("#degree").easyAutocomplete({
		data: degreeprograms,

	    categories: [{
	        listLocation: "College of Liberal Arts",
	        header: "College of Liberal Arts"
	    }, {
	        listLocation: "Ramon V. del Rosario College of Business",
	        header: "Ramon V. del Rosario College of Business"
	    }, {
	        listLocation: "School of Economics",
	        header: "School of Economics"
	    }, {
	        listLocation: "Gokongwei College of Engineering",
	        header: "Gokongwei College of Engineering"
	    }, {
	        listLocation: "College of Computer Studies",
	        header: "College of Computer Studies"
	    }, {
	        listLocation: "College of Science",
	        header: "College of Science"
	    }, {
	        listLocation: "Br. Andrew Gonzalez FSC College of Education",
	        header: "Br. Andrew Gonzalez FSC College of Education"
	    }, {
	        listLocation: "College of Law",
	        header: "College of Law"
	    }, {
	        listLocation: "Graduate Studies",
	        header: "Graduate Studies"
	    }],

	    getValue: function(element) {
	        return element.degree;
	    },
	    adjustWidth: false,

	    list: {
	        match: {
	            enabled: true
	        },
	        sort: {
	            enabled: true
	        }
	    }
	});

	$("#province").easyAutocomplete({
	    data: provinces,
	    getValue: function(element) {
	        return element.province;
	    },
	    adjustWidth: false,
	    list: {
	    	maxNumberOfElements: 6,
	    	match: {
				enabled: true
			},
			sort: {
	            enabled: true
	        },
			onClickEvent: function() {
				var province = $("#province").val();
				$("#city").prop("disabled", false);
				$("#city").val("");
				console.log("1: " + province);
				getCities(province);
			},
			onChooseEvent: function() {
				var province = $("#province").val();
				$("#city").prop("disabled", false);
				$("#city").val("");
				console.log("1: " + province);
				getCities(province);
			}
		}
	});
});

function getCities(province) {
	console.log(province);
	var cityData;

	switch(province) {
		case "Abra": cityData = abra; break;
		case "Agusan del Norte":  cityData = agusan_del_norte; break;
		case "Agusan del Sur":  cityData = agusan_del_sur; break;
		case "Aklan":  cityData = aklan; break;
		case "Albay":  cityData = albay; break;
		case "Antique":  cityData = antique; break;
		case "Apayao":  cityData = apayao; break;
		case "Aurora":  cityData = aurora; break;
		case "Basilan":  cityData = basilan; break;
		case "Bataan":  cityData = bataan; break;
		case "Batanes":  cityData = batanes; break;
		case "Batangas":  cityData = batangas; break;
		case "Benguet":  cityData = benguet; break;
		case "Biliran":  cityData = biliran; break;
		case "Bohol":  cityData = bohol; break;
		case "Bukidnon":  cityData = bukidnon; break;
		case "Bulacan":  cityData = bulacan; break;
		case "Cagayan":  cityData = cagayan; break;
		case "Camarines Norte":  cityData = camarines_norte; break;
		case "Camarines Sur":  cityData = camarines_sur; break;
		case "Camiguin":  cityData = camiguin; break;
		case "Capiz": cityData = capiz; break;
		case "Catanduanes": cityData = catanduanes; break;
		case "Cavite": cityData = cavite; break;
		case "Cebu": cityData = cebu; break;
		case "Compostela Valley": cityData = compostela_valley; break;
		case "Cotabato": cityData = cotabato; break;
		case "Davao del Norte": cityData = davao_del_norte; break;
		case "Davao del Sur": cityData = davao_del_sur; break;
		case "Davao Oriental": cityData = davao_oriental; break;
		case "Dinagat Islands": cityData = dinagat_islands; break;
		case "Eastern Samar": cityData = eastern_samar; break;
		case "Guimaras": cityData = guimaras; break;
		case "Ifugao": cityData = ifugao; break;
		case "Ilocos Norte": cityData = ilocos_norte; break;
		case "Ilocos Sur": cityData = ilocos_sur; break;
		case "Iloilo": cityData = iloilo; break;
		case "Isabela": cityData = isabela; break;
		case "Kalinga": cityData = kalinga; break;
		case "La Union": cityData = la_union; break;
		case "Laguna": cityData = laguna; break;
		case "Lanao del Norte": cityData = lanao_del_norte; break;
		case "Lanao del Sur": cityData = lanao_del_sur; break;
		case "Leyte": cityData = leyte; break;
		case "Maguindanao": cityData = maguindanao; break;
		case "Marinduque": cityData = marinduque; break;
		case "Masbate": cityData = masbate; break;
		case "Metro Manila": cityData = metro_manila; break;
		case "Misamis Occidental": cityData = misamis_occidental; break;
		case "Misamis Oriental": cityData = misamis_oriental; break;
		case "Mountain Province": cityData = mountain_province; break;
		case "Negros Occidental": cityData = negros_occidental; break;
		case "Negros Oriental": cityData = negros_oriental; break;
		case "Northern Samar": cityData = northern_samar; break;
		case "Nueva Ecija": cityData = nueva_ecija; break;
		case "Nueva Vizcaya": cityData = nueva_vizcaya; break;
		case "Occidental Mindoro": cityData = occidental_mindoro; break;
		case "Oriental Mindoro": cityData = oriental_mindoro; break;
		case "Palawan": cityData = palawan; break;
		case "Pampanga": cityData = pampanga; break;
		case "Pangasinan": cityData = pangasinan; break;
		case "Quezon": cityData = quezon; break;
		case "Quirino": cityData = quirino; break;
		case "Rizal": cityData = rizal; break;
		case "Romblon": cityData = romblon; break;
		case "Samar": cityData = samar; break;
		case "Sarangani": cityData = sarangani; break;
		case "Shariff Kabunsuan": cityData = shariff_kabunsuan; break;
		case "Siquijor": cityData = siquijor; break;
		case "Sorsogon": cityData = sorsogon; break;
		case "South Cotabato": cityData = south_cotabato; break;
		case "Southern Leyte": cityData = southern_leyte; break;
		case "Sultan Kudarat": cityData = sultan_kudarat; break;
		case "Sulu": cityData = sulu; break;
		case "Surigao del Norte": cityData = surigao_del_norte; break;
		case "Surigao del Sur": cityData = surigao_del_sur; break;
		case "Tarlac": cityData = tarlac; break;
		case "Tawi-Tawi": cityData = tawitawi; break;
		case "Zambales": cityData = zambales; break;
		case "Zamboanga del Norte": cityData = zamboanga_del_norte; break;
		case "Zamboanga del Sur": cityData = zamboanga_del_sur; break;
		case "Zamboanga Sibugay": cityData = zamboanga_sibugay; break;
	}

	$("#city").easyAutocomplete({
	    data: cityData,
	    getValue: function(element) {
	        return element.city;
	    },
	    adjustWidth: false,
	    list: {
	    	maxNumberOfElements: 6,
	    	match: {
				enabled: true
			},
			sort: {
	            enabled: true
	        }
		}
	});
}

$(document).on("click", "#delete", function() {
	$("#deleteid").val($(this).data('id'));
	$("#deleteAffMethod").submit();
});

