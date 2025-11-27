

// 001 - Read Sign
if ($(this).data("popoption") === '001-readsign') { 
	var html = "<div class='pop1'>";
	html += "<h2>You read the sign</h2>";
	html += "<span class='bigImg icon-sign lightbrown'></span>";
	html += "<hr><span class='fa fa-arrow-down rotate-45'></span><strong>Wood Cabin - START HERE</strong><br>Old Man & Young Soldier";
	html += "<hr><strong>Pajama Shaman</strong><span class='fa fa-arrow-up rotate-45'></span><br>Shop, Skills, & Spells";
	html += "<hr><span class='fa fa-arrow-left rotate-45'></span><strong>Healing Waterfall</strong><br>Supercharge your HP & MP";
	html += "<hr><strong>Spider Cave</strong><span class='fa fa-arrow-right rotate-45'></span><br>Fight Baddies! Get XP & Loot";
	html += "<hr><strong class='lightbrown'>Visit the Old Man to the southwest when you are ready to start your first quest.</strong>";
	html += "</div>";
	$("#popContent").html(html);
}
