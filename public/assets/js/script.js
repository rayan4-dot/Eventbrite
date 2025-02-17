document.addEventListener('DOMContentLoaded', function () {

    initCategoryDropdown();
    initRegionCity();

    // Category CRUD
    initCategoryCRUD();
});

/**
 * Initialize category select dropdown for the event create form.
 */
function initCategoryDropdown() {
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
}

/**
 * Initialize region and city dropdowns.
 */
function initRegionCity() {
    let regionSelect = document.getElementById('region');
    if (regionSelect) {
        loadRegions(regionSelect);
    }
    let citySelect = document.getElementById('city');
    if (citySelect && regionSelect) {
        regionSelect.addEventListener('change', function () {
            let regionId = this.value;
            citySelect.innerHTML = '<option value="">Loading...</option>';
            citySelect.disabled = true;

            if (regionId) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', '/api/cities?regionId=' + regionId, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let cities = JSON.parse(xhr.responseText);
                        citySelect.innerHTML = '<option value="">Select a city</option>';
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
        });
    }
}

/**
 * Load regions into a region select element.
 * @param {HTMLElement} regionSelect
 */
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
            });
        }
    };
    xhr.send();
}

/**
 * Initialize category CRUD: create, edit, and delete.
 */
function initCategoryCRUD() {
    // Add Category - show modal
    const addCategoryButton = document.getElementById('addCategoryButton');
    const categoryModal = document.getElementById('CategoryModal');
    const closeModalButton = document.getElementById('closeModalButton');
    const editCategoryModal = document.getElementById('editCategoryModal');
    const closeEditModal = document.getElementById('closeEditModal');
    const categoryForm = document.getElementById('categoryForm');
    if (addCategoryButton && categoryModal) {
        addCategoryButton.addEventListener('click', function () {
            categoryModal.classList.remove('hidden');
        });
    }
    if (closeModalButton && categoryModal) {
        closeModalButton.addEventListener('click', function () {
            categoryModal.classList.add('hidden');
        });
    }

    if (closeEditModal && editCategoryModal) {
        closeEditModal.addEventListener('click', function () {
            editCategoryModal.classList.add('hidden');
        });
    }
    // Optional: close modal when clicking outside of it
    window.addEventListener('click', function (event) {
        if (event.target === categoryModal) {
            categoryModal.classList.add('hidden');
        }
    });

    const editCategoryForm = document.getElementById('editCategoryForm');
    if (editCategoryForm) {
        editCategoryForm.addEventListener('submit', function (e) {
            e.preventDefault();
            updateCategory();
        });
    }

    // Create Category via AJAX
    if (categoryForm) {
        categoryForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(categoryForm);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/admin/categories', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        const res = JSON.parse(xhr.responseText);
                        if (res.success) {
                            // Hide modal and refresh category table
                            categoryModal.classList.add('hidden');
                            categoryForm.reset();
                            updateCategoryTable();
                        } else {
                            // Optionally display validation errors in the modal
                            console.error("Validation errors:", res.errors);
                        }
                    } else {
                        console.error("Server error:", xhr.status);
                    }
                }
            };
            xhr.onerror = function () {
                console.error("Network error while adding category.");
            };
            xhr.send(formData);
        });
    }

    const categoryTableBody = document.getElementById('categoryTableBody');
    if (categoryTableBody) {

        categoryTableBody.addEventListener('click', function (e) {
            if (e.target.matches('.edit-button')) {

                const categoryId = e.target.getAttribute('data-id');
                editCategory(categoryId);
            } else if (e.target.matches('.delete-button')) {

                const categoryId = e.target.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this category?')) {
                    deleteCategory(categoryId);
                }
            }
        });
    }

    // Initially load categories to populate the table
    updateCategoryTable();
}

/**
 * Fetch and update the category table via AJAX.
 */
function updateCategoryTable() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/categories', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let categories = JSON.parse(xhr.responseText);

            if (categories.length > 0) {
                categories.forEach(category => {
                    html += `
                    <tr class="hover:bg-gray-700/50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-blue-600/10 rounded-lg mr-3">
                                    <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-white">${category.name}</div>
                                    <div class="text-xs text-gray-400">${category.description}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium bg-blue-600/10 text-blue-500 rounded-full">
                                ${category.total_events || 0} Events
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button class="edit-button text-gray-400 hover:text-white mr-3" data-id="${category.id}">
                                Edit
                            </button>
                            <button class="delete-button text-red-500 hover:text-red-600" data-id="${category.id}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    `;
                });
            } else {
                html = `<tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-400">No categories found.</td>
                </tr>`;
            }
            document.getElementById('categoryTableBody').innerHTML = html;
        }
    };
    xhr.onerror = function () {
        console.error("Error fetching categories.");
    };
    xhr.send();
}

/**
 * Fetch category data and open the edit modal.
 * @param {string} categoryId
 */
function editCategory(categoryId) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `/admin/categories/edit/${categoryId}`, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const category = JSON.parse(xhr.responseText);
            // Populate your edit modal fields (assumes you have these fields in the edit modal)
            document.getElementById('editCategoryName').value = category.name;
            document.getElementById('editCategoryDescription').value = category.description;
            // Store categoryId in a hidden input or data attribute
            document.getElementById('editCategoryForm').setAttribute('data-id', categoryId);
            // Show the edit modal
            document.getElementById('editCategoryModal').classList.remove('hidden');
        }
    };
    xhr.send();
}

/**
 * Send an AJAX request to update a category.
 */
function updateCategory() {
    const editForm = document.getElementById('editCategoryForm');
    const categoryId = editForm.getAttribute('data-id');
    const formData = new FormData(editForm);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', `/admin/categories/edit/${categoryId}`, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const res = JSON.parse(xhr.responseText);

            if (res.success) {
                document.getElementById('editCategoryModal').classList.add('hidden');
                updateCategoryTable();
            } else {
                console.error("Update errors:", res.errors);
            }
        }
    };
    xhr.send(formData);
}


/**
 * Delete a category via AJAX.
 * @param {string} categoryId
 */
function deleteCategory(categoryId) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', `/admin/categories/delete/${categoryId}`, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const res = JSON.parse(xhr.responseText);
            if (res.success) {
                updateCategoryTable();
            } else {
                console.error("Delete error:", res.message);
            }
        }
    };
    xhr.send();
}

function loadAllEvents() {
    const eventContainer = document.getElementById('eventGrid');
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/events', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let events = JSON.parse(xhr.responseText);
            let html = '';
            events.forEach(event => {
                html += `
                        <div class="bg-gray-800 p-4 rounded-lg">
                            <img src="/assets/img/event.jpg" alt="Event Image" class="w-full h-40 object-cover rounded">
                            <div class="mt-2 text-orange-500">${event.categoryId}</div>
                            <h3 class="text-white text-xl font-bold">${event.title}</h3>
                            <p class="text-gray-400">${event.location}</p>
                            <p class="text-white font-bold mt-2">${event.price}</p>
                            <a href="/events/${event.id}" class="view-details btn btn-sm bg-orange-600 text-white mt-2" data-id="${event.id}">View Details</a>
                        </div>
                    `;
            })
            eventContainer.innerHTML = html;
        }
    }
    xhr.send();
}

/**
 * @param {number|string} eventId - The event ID to fetch.
 */
function loadEventDetails(eventId) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `/api/events/${eventId}`, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Parse the JSON response
                const event = JSON.parse(xhr.responseText);
                console.log(event);
                document.getElementById('eventImage').src = `/assets${event.picture}`;
                document.getElementById('eventCategory').textContent = event.categoryname;
                document.getElementById('eventTitle').textContent = event.title;
                document.getElementById('eventDate').textContent = event.eventdate;
                document.getElementById('eventCity').textContent = event.location;
                document.getElementById('eventDescription').textContent = event.description;
                document.getElementById('eventSponsors').innerHTML = '';
                document.getElementById('eventCapacity').textContent = event.capacity;

                if(event.price == 0 || event.price === null) {
                    document.getElementById('eventPrice').textContent = "Free";
                } else {
                    document.getElementById('eventPrice').textContent = event.price;
                }

                // Update modal elements
                document.getElementById('modalEventId').value = event.id;
                document.getElementById('modalEventTitle').textContent = event.title;
                document.getElementById('modalEventPrice').textContent = event.price == 0 ? 'Free' : `$${event.price}`;
                document.getElementById('modalEventDate').textContent = event.eventdate;
                document.getElementById('modalEventLocation').textContent = event.location;
                document.getElementById('modalTotalPrice').textContent = event.price == 0 ? 'Free' : `$${event.price}`;


            } else {
                console.error('Error fetching event details:', xhr.status);
            }
        }
    };

    xhr.onerror = function () {
        console.error("Network error while fetching event details");
    };

    xhr.send();
}


function initBookingModal() {
    const bookingForm = document.getElementById('bookingForm');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(bookingForm);
            console.log(formData);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/book', true); // Ensure your route for free booking is /book
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        const res = JSON.parse(xhr.responseText);
                        if (res.success) {
                            alert(res.message);
                            // Optionally, update the capacity on the page
                            document.getElementById('registrationModal').classList.add('hidden');
                            bookingForm.reset();
                        } else {
                            alert("Error: " + (res.message || JSON.stringify(res.errors)));
                        }
                    } else {
                        console.error("Server error:", xhr.status);
                    }
                }
            };
            xhr.onerror = function () {
                console.error("Network error during booking.");
            };
            xhr.send(formData);
        });
    }
}


function loadTopEvents() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/topEvents', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let events = JSON.parse(xhr.responseText);
                const container = document.getElementById('topEventsContainer');
                const noEventsMessage = document.getElementById('noEventsMessage');
                let html = "";
                if (events.length > 0) {
                    events.forEach(event => {
                        html += `
                        <div class="event-card bg-gray-800 rounded-xl overflow-hidden border border-gray-700">
                            <div class="relative">
                               <img src="${ event.picture ? '/assets' + event.picture : '/assets/img/placeholder.jpg' }" alt="${ event.title }" class="w-full h-56 object-cover">
                                <div class="absolute top-4 right-4 bg-gray-900/80 px-3 py-1 rounded-full text-sm">
                                    ${ event.categoryName || '' }
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="text-orange-500 font-medium">${ event.date ? event.date : '' }</span>
                                    <span class="text-gray-500">•</span>
                                    <span class="text-gray-400">${ event.location ? event.location : '' }</span>
                                </div>
                                <h3 class="font-bold text-xl">${ event.title }</h3>
                                <p class="text-gray-400">${ event.description ? event.description.substring(0, 60) + '...' : '' }</p>
                                <div class="flex items-center justify-between mt-4">
                                    <span class="text-lg font-bold text-orange-500">
                                        ${ event.price == 0 ? 'Free' : '$' + event.price }
                                    </span>
                                    <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors"
                                        onclick="window.location.href='/events/${ event.id }'">
                                        Details
                                    </button>
                                </div>
                            </div>
                        </div>
                        `;
                    });
                    container.innerHTML = html;
                    noEventsMessage.classList.add('hidden');
                } else {
                    container.innerHTML = "";
                    noEventsMessage.classList.remove('hidden');
                }
            } else {
                console.error("Error fetching top events:", xhr.status);
            }
        }
    };
    xhr.onerror = function () {
        console.error("Network error while fetching top events.");
    };
    xhr.send();
}