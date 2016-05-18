	manu.pagination = {
		handleEvents: function() {
			$(".alpha_browser .page").live("click", function() {
				var letter = $(this).text().toLowerCase();
				var parent = $(this).parents(".alpha_browser").get(0);
				if ($(parent).hasClass("primary")) {
					if (manu.supportHistoryPlugin) {
						manu.pagination.updateHash("letter", [ letter ]);
					} else {
						manu.pagination.loadAlphaPage(parent, letter);
					}
				} else {
					manu.pagination.loadAlphaPage(parent, letter);
				}
	
				return false;
			});
			$(".pagination .page, .pagination_prevnext .page").live(
					"click",
					function() {
						var page = this.id.substr(6);
						var parent = $(this).parents(
						".pagination, .pagination_prevnext").get(0);
						if ($(parent).hasClass("primary")) {
							if (!$(parent).hasClass("pgn_ajax")) {
								return true;
							}
							if (manu.supportHistoryPlugin) {
								manu.pagination.updateHash("page", [ page ]);
							} else {
								manu.pagination.loadNumericPage(parent, page);
							}
						} else {
							manu.pagination.loadNumericPage(parent, page);
						}
	
						return false;
					});
		},
		loadNumericPage : function(elem, page) {
			if ($(elem).length == 0)
				return;
			var container = $(elem).parents(".container").get(0);
			if ($(elem).hasClass("pgn_scrolltop")) {
				if (jQuery().scrollTo) {
					$.scrollTo($(container));
				}
			}
			var primary = $(elem).hasClass("primary") ? 1 : 0;
			var action = $(elem).find(".pgn_action").text();
			manu.loadAction($(container), action, {
				page : page,
				_primary : primary
			}, function() {
			});
		},

		loadAlphaPage : function(elem, letter) {
			if ($(elem).length == 0)
				return;
			var container = $(elem).parents(".container").get(0);
			var action = $(elem).find(".pgn_action").text();
			manu.loadAction($(container), action, {
				letter : letter
			}, function() {
			});
		},
		updateHash : function(action, params) {
			// remove leading #,/ and trailing /
			var hash = location.hash.replace(/^#\/?/, "").replace(/\/?$/, "/");
			if (action == 'page') {
				hash = hash.replace(/page\/\d+/, "") + "page/" + params[0];
			}
			if (action == 'letter') {
				hash = hash.replace(/page\/\d+/, "");
				hash = hash.replace(/letter\/[\w-09]+/, "") + "letter/" + params[0];
			}
			if (location.hash != "#" + hash) {
				$.historyLoad(hash);
			}
			return false;
		},
		handlePageload : function(hash) {
			var hash = hash.replace(/^[#\/]+/, "");
			if (hash != "") {
				var parts = hash.split("/");
				var actions = [];
				pathname = location.pathname.replace(/\/?$/, "");
				var page, letter;
				for ( var i = 0; i < parts.length; i++) {
					var action = parts[i++];
					var value = parts[i];
					if (action == 'page') {
						hash = hash.replace(/\/?page\/\d+/, "");
						pathname = pathname.replace(/\/page\/\d+/, "") + "/page/" + value;
						page = value;
					}

					if (action == 'letter') {
						// remove page number when letter is changed
						hash = hash.replace(/\/?page\/\d+/, "");
						pathname = pathname.replace(/\/page\/\d+/, "");
						hash = hash.replace(/\/?letter\/[\w-09]+/, "");
						pathname = pathname.replace(/\/letter\/[\w-09]+/, "")	+ "/letter/" + value;
						letter = value;
						page = 1;
					}
				}
				pathname += "/";
				if (hash) {
					hash = "#" + hash;
				}
				if (pageloadflag) {
					location.href = location.protocol + "//" + location.host
					+ pathname + location.search + hash;
					return false;
				} else {
					if (page && !letter) {
						manu.pagination.loadNumericPage(
								$(".pagination.primary, .pagination_prevnext.primary"),
								page);
					}

					if (letter) {
						// $("#alpha_browser .load_page").html(letter).click();
						manu.pagination.loadAlphaPage($(".alpha_browser"), letter);

					}
				}
			} else {
				if (!pageloadflag) {
					var page = "1";
					var pathname = location.pathname.replace(/\/?$/, "");
					if (pathname.match(/\/page\/\d+/)) {
						page = pathname.replace(/.*\/page\/(\d+).*/, "$1");
					}
					if (pathname.match(/\/letter\/[\w-09]+/)) {
						page = pathname.replace(/.*\/letter\/([\w-09]+).*/, "$1");
					}

					if (lasthash != "" && lasthash.match(/\/page\/\d+/)) {
						manu.pagination.loadNumericPage(
								$(".pagination.primary, .pagination_prevnext.primary"),
								page);
					}
					if (lasthash != "" && lasthash.match(/\/letter\/[\w-09]+/)) {
						manu.pagination.loadAlphaPage($(".alpha_browser"), letter);
					}
				}
			}
			lasthash = location.hash;
			pageloadflag = false;
			return false;
		}
	};
