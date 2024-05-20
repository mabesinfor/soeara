import $ from 'jquery';
window.$ = window.jQuery = $;

import "./bootstrap";

// Burger menus
document.addEventListener("DOMContentLoaded", function () {
    // open
    const burger = document.querySelectorAll(".navbar-burger");
    const menu = document.querySelectorAll(".navbar-menu");

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("hidden");
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll(".navbar-close");
    const backdrop = document.querySelectorAll(".navbar-backdrop");

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("hidden");
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("hidden");
                }
            });
        }
    }

    // Dropdown menu profil
    const profileDropdown = document.getElementById("profile-dropdown");
    const profileDropdownMenu = document.getElementById(
        "profile-dropdown-menu"
    );

    if (profileDropdown && profileDropdownMenu) {
        // Hanya tampilkan dropdown menu pada layar desktop
        if (window.innerWidth >= 1024) {
            profileDropdown.addEventListener("click", function () {
                profileDropdownMenu.classList.toggle("hidden");
            });

            document.addEventListener("click", function (event) {
                if (
                    !profileDropdown.contains(event.target) &&
                    !profileDropdownMenu.contains(event.target)
                ) {
                    profileDropdownMenu.classList.add("hidden");
                }
            });
        }
    }
});

// counter on scroll
var count = document.getElementsByClassName("count");
var inc = [];
var targets = [];

function initializeTargets() {
    for (let i = 0; i < count.length; i++) {
        targets[i] = parseInt(count[i].getAttribute("data-target"));
    }
}

function updateCount(timestamp) {
    var elapsed = timestamp - startTime;
    var progress = Math.min(elapsed / duration, 1);

    for (let i = 0; i < count.length; i++) {
        var value = Math.floor(progress * targets[i]);
        count[i].innerHTML = value;
    }

    if (progress < 1) {
        window.requestAnimationFrame(updateCount);
    }
}

var startTime,
    duration = 3000; // 3 detik

var stats = document.getElementById("stats");
window.onscroll = function () {
    var topElement = stats.offsetTop;
    var bottomElement = stats.offsetTop + stats.clientHeight;
    var topScreen = window.pageYOffset;
    var bottomScreen = window.pageYOffset + window.innerHeight;

    if (bottomScreen > topElement && topScreen < bottomElement) {
        initializeTargets();
        startTime = performance.now();
        window.requestAnimationFrame(updateCount);
    }
};

//select provinsi dan kota
document.addEventListener('DOMContentLoaded', function() {
    // Fetch provinces
    fetch('/api/provinces')
        .then(response => response.json())
        .then(provinces => {
            const provinceSelect = document.getElementById('province');
            
            provinces.forEach(province => {
                let option = document.createElement('option');
                option.value = province.id;
                option.text = province.name;
                option.className = 'bg-[#121212] text-white'
                provinceSelect.appendChild(option);
            });
        });

    // Fetch districts based on selected province
    document.getElementById('province').addEventListener('change', function() {
        const provinceId = this.value;
        const districtSelect = document.getElementById('district');
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

        if (provinceId) {
            fetch(`/api/districts/${provinceId}`)
                .then(response => response.json())
                .then(districts => {
                    districts.forEach(district => {
                        let option = document.createElement('option');
                        option.value = district.id;
                        option.text = district.name;
                        option.className = 'bg-[#121212] text-white'
                        districtSelect.appendChild(option);
                    });
                });
        }
    });
});