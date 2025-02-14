// fetch categories using ajax
document.addEventListener('DOMContentLoaded', function () {
    let categorySelect = document.getElementById('category-field');
    if (categorySelect) {
        const xhrCategories = new XMLHttpRequest();
        xhrCategories.open('GET', '/api/categories', true);
        xhrCategories.onreadystatechange = function () {
            if (xhrCategories.readyState === 4 && xhrCategories.status === 200) {
                let categories = JSON.parse(xhrCategories.responseText);
                categories.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    categorySelect.appendChild(option);
                });
            }
        };
        xhrCategories.onerror = function () {
            console.error("Network error while fetching categories");
        };
        xhrCategories.send();
    }

    let regionSelect = document.getElementById('region');
    loadRegions(regionSelect);

    let citySelect = document.getElementById('city');
    if(citySelect) {
        regionSelect.addEventListener('change', function() {
            let regionId = this.value;
            citySelect.innerHTML = '<option value="loading" disabled></option>';
            citySelect.disabled = true;

            if(regionId) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', '/api/cities?regionId=' + regionId, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let cities = JSON.parse(xhr.responseText);
                        console.log(cities);
                        cities.forEach(city => {
                            let option = document.createElement('option');
                            option.value = city.id;
                            option.textContent = city.name;
                            citySelect.appendChild(option);
                        });

                        citySelect.disabled = false;
                    }
                };
                xhr.send();
            }
        })
    }

});

function loadRegions(regionSelect) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/regions', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let regions = JSON.parse(xhr.responseText);
            regions.forEach(region => {
                const option = document.createElement('option');
                option.value = region.id;
                option.textContent = region.name;
                regionSelect.appendChild(option);
            })
        }
    }
    xhr.send();
}