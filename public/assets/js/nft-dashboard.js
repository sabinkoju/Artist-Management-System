// for top collectors card
var myElement1 = document.getElementById('top-collector');
new SimpleBar(myElement1, { autoHide: true });

// for your balance card
var nft1 = {
	chart: {
		type: 'line',
		height: 40,
		sparkline: {
			enabled: true
		}
	},
	stroke: {
		show: true,
		curve: 'smooth',
		lineCap: 'butt',
		colors: undefined,
		width: 2.5,
		dashArray: 0,
	},
	fill: {
		gradient: {
			enabled: false
		}
	},
	series: [{
		name: 'Value',
		data: [20, 14, 19, 10, 25, 20, 22, 9, 12]
	}],
	yaxis: {
		min: 0,
		show: false,
		axisBorder: {
			show: false
		},
	},
	xaxis: {
		show: false,
		axisBorder: {
			show: false
		},
	},
	colors: ["rgb(132, 90, 223)"],

}
document.getElementById('nft-balance-chart').innerHTML = '';
var nft1 = new ApexCharts(document.querySelector("#nft-balance-chart"), nft1);
nft1.render();

function nftBalane() {
	nft1.updateOptions({
		colors: ["rgb(" + myVarVal + ")"],
	})
}



// for featured collections
var swiper = new Swiper(".pagination-dynamic", {
	pagination: {
		el: ".swiper-pagination",
		dynamicBullets: true,
		clickable: true,
	},
	loop: true,
	autoplay: {
		delay: 1500,
		disableOnInteraction: false
	}
});