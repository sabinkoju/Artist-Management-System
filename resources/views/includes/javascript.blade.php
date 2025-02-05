<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Custom-Switcher JS -->
<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Swiper JS -->
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<!-- Internal Sing-Up JS -->
<script src="{{ asset('assets/js/authentication.js') }}"></script>

<!-- Show Password JS -->
<script src="{{ asset('assets/js/show-password.js') }}"></script>


<!-- Popper JS -->
<script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

<!-- Defaultmenu JS -->
<script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

<!-- Node Waves JS-->
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<!-- Sticky JS -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>

<!-- Simplebar JS -->
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.js') }}"></script>

<!-- Color Picker JS -->
<script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

<!-- Apex Charts JS -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- JSVector Maps JS -->
<script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>

<!-- JSVector Maps MapsJS -->
<script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!-- Date & Time Picker JS -->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

<!-- Sales-Dashboard JS -->
<script src="{{ asset('assets/js/sales-dashboard.js') }}"></script>

<!-- Crypto-Dashboard JS -->
<script src="{{ asset('assets/js/crypto-dashboard.js') }}"></script>
<!-- HRM Dashboard JS -->
<script src="{{ asset('assets/js/personal-dashboard.js') }}"></script>


<script>
// for NFTs Statistics
var options = {
	series: [{
		name: "Debt Amount",
		data: [20, 38, 38, 72, 55, 63, 43]
	}, {
		name: "Recovered",
		data: [85, 65, 75, 38, 85, 35, 62]
	}],
	chart: {
		height: 343,
		type: 'line',
		zoom: {
			enabled: false
		},
		dropShadow: {
			enabled: true,
			enabledOnSeries: undefined,
			top: 5,
			left: 0,
			blur: 3,
			color: '#000',
			opacity: 0.1
		},
	},
	dataLabels: {
		enabled: false
	},
	legend: {
		position: "top",
		horizontalAlign: "center",
		offsetX: -15,
		fontWeight: "bold",
	},
	stroke: {
		curve: 'smooth',
		width: '3',
		dashArray: [0, 5],
	},
	grid: {
		borderColor: '#f2f6f7',
	},
	colors: ["rgb(132, 90, 223)", "rgba(132, 90, 223, 0.3)"],
	yaxis: {
		title: {
			text: 'Amount',
			style: {
				color: '#adb5be',
				fontSize: '14px',
				fontFamily: 'poppins, sans-serif',
				fontWeight: 600,
				cssClass: 'apexcharts-yaxis-label',
			},
		},
		labels: {
			formatter: function (y) {
				return y.toFixed(0) + "";
			}
		}
	},
	xaxis: {
		type: 'month',
		categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thrusday', 'Friday', 'Saturday'],
		axisBorder: {
			show: true,
			color: 'rgba(119, 119, 142, 0.05)',
			offsetX: 0,
			offsetY: 0,
		},
		axisTicks: {
			show: true,
			borderType: 'solid',
			color: 'rgba(119, 119, 142, 0.05)',
			width: 6,
			offsetX: 0,
			offsetY: 0
		},
		labels: {
			rotate: -90
		}
	}
};
document.getElementById('nft-statistics').innerHTML = ''
var chart = new ApexCharts(document.querySelector("#nft-statistics"), options);
chart.render();
function nftStatistics() {
	chart.updateOptions({
		colors: ["rgb(" + myVarVal + ")", "rgba(" + myVarVal + ", 0.3)"],
	})
}


</script>
<script>
// for Statistics
var options = {
	series: [{
		name: "Completed",
		data: [20, 38, 38, 72, 55, 63, 43]
	}, {
		name: "Failed/Withdrawn",
		data: [85, 65, 75, 38, 85, 35, 62]
	}],
	chart: {
		height: 343,
		type: 'line',
		zoom: {
			enabled: false
		},
		dropShadow: {
			enabled: true,
			enabledOnSeries: undefined,
			top: 5,
			left: 0,
			blur: 3,
			color: '#000',
			opacity: 0.1
		},
	},
	dataLabels: {
		enabled: false
	},
	legend: {
		position: "top",
		horizontalAlign: "center",
		offsetX: -15,
		fontWeight: "bold",
	},
	stroke: {
		curve: 'smooth',
		width: '3',
		dashArray: [0, 5],
	},
	grid: {
		borderColor: '#f2f6f7',
	},
	colors: ["rgb(132, 90, 223)", "rgba(132, 90, 223, 0.3)"],
	yaxis: {
		title: {
			text: 'Application',
			style: {
				color: '#adb5be',
				fontSize: '14px',
				fontFamily: 'poppins, sans-serif',
				fontWeight: 600,
				cssClass: 'apexcharts-yaxis-label',
			},
		},
		labels: {
			formatter: function (y) {
				return y.toFixed(0) + "";
			}
		}
	},
	xaxis: {
		type: 'month',
		categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thrusday', 'Friday', 'Saturday'],
		axisBorder: {
			show: true,
			color: 'rgba(119, 119, 142, 0.05)',
			offsetX: 0,
			offsetY: 0,
		},
		axisTicks: {
			show: true,
			borderType: 'solid',
			color: 'rgba(119, 119, 142, 0.05)',
			width: 6,
			offsetX: 0,
			offsetY: 0
		},
		labels: {
			rotate: -90
		}
	}
};
document.getElementById('origination-statistics').innerHTML = ''
var chart = new ApexCharts(document.querySelector("#origination-statistics"), options);
chart.render();
function nftStatistics() {
	chart.updateOptions({
		colors: ["rgb(" + myVarVal + ")", "rgba(" + myVarVal + ", 0.3)"],
	})
}


</script>
<script>
/* Earnings Report Chart */
var options = {
    series: [{
        name: "Collection",
        data: [30, 25, 36, 30, 45, 35, 64, 51, 59, 36, 39, 51]
    }, {
        name: "Payment",
        data: [33, 21, 32, 37, 23, 32, 47, 31, 54, 32, 20, 38]
    }],
    chart: {
        height: 340,
        type: "bar",
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: [1.1, 1.1],
        show: true,
        curve: ['smooth', 'smooth'],
    },
    grid: {
        borderColor: '#f3f3f3',
        strokeDashArray: 3
    },
    xaxis: {
        axisBorder: {
            color: 'rgba(119, 119, 142, 0.05)',
        },
    },
    legend: {
        show: false
    },
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    markers: {
        size: 0
    },
    colors: ["rgb(132, 90, 223)", "#e9e9e9"],
    plotOptions: {
        bar: {
            columnWidth: "50%",
            borderRadius: 2,
        }
    },
};
document.getElementById('courses-earnings').innerHTML = ''
var chart1 = new ApexCharts(document.querySelector("#courses-earnings"), options);
chart1.render();
function earningsReport() {
    chart1.updateOptions({
        colors: ["rgb(" + myVarVal + ")", "#e9e9e9"],
    })
}
</script>


<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Internal Datatables JS -->
<script src="{{ asset('assets/js/datatables.js') }}"></script>
<script src="{{ asset('assets/js/choices.js') }}"></script>

<!-- noUiSlider JS -->
<script src="{{ asset('assets/libs/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/libs/wnumb/wNumb.min.js') }}"></script>
<script src="{{ asset('assets/js/nouislider.js') }}"></script>

<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/libs/chart.js/chart.min.js') }}"></script>

