<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for language preferences.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample language data
$languages = [
    [
        'id' => 'LANG-001',
        'name' => 'English',
        'code' => 'en',
        'status' => 'Active',
        'is_default' => true,
        'last_updated' => '2025-07-28 10:00 AM',
        'description' => 'Default system language for alerts and interfaces.'
    ],
    [
        'id' => 'LANG-002',
        'name' => 'Filipino',
        'code' => 'fil',
        'status' => 'Active',
        'is_default' => false,
        'last_updated' => '2025-07-28 09:30 AM',
        'description' => 'Philippine national language for localized alerts.'
    ],
    [
        'id' => 'LANG-003',
        'name' => 'Cebuano',
        'code' => 'ceb',
        'status' => 'Inactive',
        'is_default' => false,
        'last_updated' => '2025-07-27 02:00 PM',
        'description' => 'Regional language for Cebu and surrounding areas.'
    ],
    [
        'id' => 'LANG-004',
        'name' => 'Ilokano',
        'code' => 'ilo',
        'status' => 'Active',
        'is_default' => false,
        'last_updated' => '2025-07-27 03:45 PM',
        'description' => 'Regional language for Ilocos Region and Northern Luzon.'
    ]
];

// Sample options for dropdowns
$languageStatuses = ['All', 'Active', 'Inactive'];
$defaultOptions = ['All', 'Yes', 'No'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Language Preference Manager</h1>
        <?php
        $hasProfilePic = !empty($userProfilePic);
        if ($isLoggedIn) : ?>
            <div class="flex items-center space-x-3">
                <?php if ($hasProfilePic) : ?>
                    <img src="<?php echo htmlspecialchars($userProfilePic); ?>"
                         alt="<?php echo htmlspecialchars($userName); ?>'s Profile Picture"
                         class="w-10 h-10 rounded-full object-cover border-2 border-blue-400">
                <?php else : ?>
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center border-2 border-gray-400">
                        <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                <?php endif; ?>
                <span class="text-lg font-medium hidden md:block"><?php echo htmlspecialchars($userName); ?></span>
            </div>
        <?php endif; ?>
    </header>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage System Language Settings</h2>
        <p class="text-gray-700 leading-relaxed">
            The Language Preference Manager allows administrators to configure and manage the various languages supported by the emergency communication system. This includes setting default languages, activating/deactivating languages, and ensuring multilingual content delivery.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Configured Languages</h2>

        <div class="mb-6 flex justify-between items-center">
            <!-- Filter Controls -->
            <div class="flex space-x-4">
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($languageStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterDefault" class="block text-sm font-medium text-gray-700">Filter by Default:</label>
                    <select id="filterDefault" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($defaultOptions as $option) : ?>
                            <option value="<?php echo htmlspecialchars($option); ?>"><?php echo htmlspecialchars($option); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Language
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Code</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Default</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Updated</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="languageTableBody">
                    <!-- Languages will be rendered here by JavaScript -->
                    <?php if (empty($languages)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No languages configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals (re-using pattern) -->
    <!-- Language Configuration Modal (Add/Edit) -->
    <div id="configModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="configModalTitle">Add New Language</h3>
            <form id="configForm" onsubmit="return saveLanguage(event)">
                <input type="hidden" id="languageId">
                <div class="mb-4">
                    <label for="languageName" class="block text-sm font-medium text-gray-700">Language Name</label>
                    <input type="text" id="languageName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="languageCode" class="block text-sm font-medium text-gray-700">Language Code (e.g., 'en', 'fil')</label>
                    <input type="text" id="languageCode" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., en, fil, ceb" required>
                </div>
                <div class="mb-4">
                    <label for="languageDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="languageDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this language"></textarea>
                </div>
                <div class="mb-4">
                    <label for="languageStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="languageStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="isDefault" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="isDefault" class="ml-2 block text-sm text-gray-900">Set as Default Language</label>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save Language
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Language Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Language Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalLanguageId"></span></p>
                <p><strong>Name:</strong> <span id="modalLanguageName"></span></p>
                <p><strong>Code:</strong> <span id="modalLanguageCode"></span></p>
                <p><strong>Status:</strong> <span id="modalLanguageStatus"></span></p>
                <p><strong>Default:</strong> <span id="modalIsDefault"></span></p>
                <p><strong>Last Updated:</strong> <span id="modalLastUpdated"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalLanguageDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal (re-used) -->
    <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="confirmationModalTitle">Confirm Action</h3>
            <p class="text-gray-700 mb-6" id="confirmationModalMessage"></p>
            <div class="flex justify-center space-x-4">
                <button id="confirmCancelBtn" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Cancel
                </button>
                <button id="confirmProceedBtn" class="px-4 py-2 text-sm font-medium text-blue-600 rounded-md hover:bg-blue-700">
                    Proceed
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Message Modal (re-used) -->
    <div id="alertModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="alertModalTitle">Notification</h3>
            <p class="text-gray-700 mb-6" id="alertModalMessage"></p>
            <div class="flex justify-center">
                <button id="alertCloseBtn" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                    OK
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    // Initial language data from PHP
    let languagesData = <?php echo json_encode($languages); ?>;

    // Get references to DOM elements
    const languageTableBody = document.getElementById('languageTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterDefaultSelect = document.getElementById('filterDefault');

    // Custom Alert Modal elements (re-used from other modules)
    const alertModal = document.getElementById('alertModal');
    const alertModalTitle = document.getElementById('alertModalTitle');
    const alertModalMessage = document.getElementById('alertModalMessage');
    const alertCloseBtn = document.getElementById('alertCloseBtn');

    // Custom Confirmation Modal elements (re-used from other modules)
    const confirmationModal = document.getElementById('confirmationModal');
    const confirmationModalTitle = document.getElementById('confirmationModalTitle');
    const confirmationModalMessage = document.getElementById('confirmationModalMessage');
    const confirmCancelBtn = document.getElementById('confirmCancelBtn');
    const confirmProceedBtn = document.getElementById('confirmProceedBtn');
    let confirmCallback = null; // Stores the callback function for confirmation

    /**
     * Shows a custom alert modal.
     * @param {string} message - The message to display.
     * @param {string} [title='Notification'] - The title of the modal.
     */
    function showAlert(message, title = 'Notification') {
        alertModalTitle.textContent = title;
        alertModalMessage.textContent = message;
        alertModal.classList.remove('hidden');
    }

    /**
     * Shows a custom confirmation modal.
     * @param {string} message - The message to display.
     * @param {Function} callback - The function to call if confirmed (true for proceed, false for cancel).
     * @param {string} [title='Confirm Action'] - The title of the modal.
     */
    function showConfirm(message, callback, title = 'Confirm Action') {
        confirmationModalTitle.textContent = title;
        confirmationModalMessage.textContent = message;
        confirmCallback = callback; // Store the callback
        confirmationModal.classList.remove('hidden');
    }

    // Event listeners for custom modals
    alertCloseBtn.addEventListener('click', () => {
        alertModal.classList.add('hidden');
    });

    confirmCancelBtn.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
        if (confirmCallback) {
            confirmCallback(false); // Call callback with false for cancel
            confirmCallback = null; // Clear callback
        }
    });

    confirmProceedBtn.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
        if (confirmCallback) {
            confirmCallback(true); // Call callback with true for proceed
            confirmCallback = null; // Clear callback
        }
    });

    /**
     * Renders the language table based on the provided data.
     * @param {Array} dataToRender - The array of language objects to display.
     */
    function renderLanguageTable(dataToRender) {
        languageTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No languages configured.</td>`;
            languageTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(lang => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (lang.status === 'Active') statusClass = 'bg-green-100 text-green-800';
            else if (lang.status === 'Inactive') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${lang.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${lang.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${lang.code}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${lang.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${lang.is_default ? 'Yes' : 'No'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${lang.last_updated || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewDetails('${encodeURIComponent(JSON.stringify(lang))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openConfigModal('edit', '${encodeURIComponent(JSON.stringify(lang))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="testLanguage('${lang.id}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Test</button>
                    <button onclick="deleteLanguage('${lang.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            languageTableBody.appendChild(row);
        });
    }

    /**
     * Filters the language data based on selected criteria and re-renders the table.
     */
    function filterLanguages() {
        const selectedStatus = filterStatusSelect.value;
        const selectedDefault = filterDefaultSelect.value;

        const filteredData = languagesData.filter(lang => {
            const matchesStatus = selectedStatus === 'All' || lang.status === selectedStatus;
            const matchesDefault = selectedDefault === 'All' || (selectedDefault === 'Yes' && lang.is_default) || (selectedDefault === 'No' && !lang.is_default);
            return matchesStatus && matchesDefault;
        });

        renderLanguageTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterLanguages);
    filterDefaultSelect.addEventListener('change', filterLanguages);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderLanguageTable(languagesData);

        // Get elements for Language Config Modal
        const configModal = document.getElementById('configModal');
        const configModalTitle = document.getElementById('configModalTitle');
        const languageIdField = document.getElementById('languageId');
        const languageNameField = document.getElementById('languageName');
        const languageCodeField = document.getElementById('languageCode');
        const languageDescriptionField = document.getElementById('languageDescription');
        const languageStatusField = document.getElementById('languageStatus');
        const isDefaultField = document.getElementById('isDefault');

        /**
         * Opens the language configuration modal for adding new or editing existing languages.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [languageJson=null] - JSON string of the language data if in 'edit' mode.
         */
        window.openConfigModal = function(mode, languageJson = null) {
            configModal.classList.remove('hidden');
            if (mode === 'new') {
                configModalTitle.textContent = 'Add New Language';
                languageIdField.value = '';
                languageNameField.value = '';
                languageCodeField.value = '';
                languageDescriptionField.value = '';
                languageStatusField.value = 'Active';
                isDefaultField.checked = false;
            } else if (mode === 'edit' && languageJson) {
                const lang = JSON.parse(decodeURIComponent(languageJson));
                configModalTitle.textContent = 'Edit Language';
                languageIdField.value = lang.id;
                languageNameField.value = lang.name;
                languageCodeField.value = lang.code;
                languageDescriptionField.value = lang.description;
                languageStatusField.value = lang.status;
                isDefaultField.checked = lang.is_default;
            }
        };

        /**
         * Closes the language configuration modal.
         */
        window.closeConfigModal = function() {
            configModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) a language.
         * @param {Event} event - The form submission event.
         */
        window.saveLanguage = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = languageIdField.value;
            const name = languageNameField.value.trim();
            const code = languageCodeField.value.trim().toLowerCase();
            const description = languageDescriptionField.value.trim();
            const status = languageStatusField.value;
            const is_default = isDefaultField.checked;

            if (!name || !code) {
                showAlert('Please fill in all required fields (Language Name, Language Code).', 'Input Error');
                return false;
            }

            // Ensure only one language is default
            if (is_default) {
                languagesData.forEach(lang => {
                    if (lang.is_default && lang.id !== id) {
                        lang.is_default = false; // Unset previous default
                    }
                });
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newLanguage = {
                id: id || 'LANG-' + (languagesData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                code: code,
                status: status,
                is_default: is_default,
                last_updated: timestamp,
                description: description
            };

            if (id) {
                // Update existing
                const index = languagesData.findIndex(lang => lang.id === id);
                if (index !== -1) {
                    languagesData[index] = newLanguage;
                    showAlert(`Language "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                languagesData.push(newLanguage);
                showAlert(`Language "${name}" added successfully!`, 'Success');
            }

            closeConfigModal();
            filterLanguages(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the language details modal with the given language's data.
         * @param {string} languageJson - JSON string of the language entry.
         */
        window.viewDetails = function(languageJson) {
            const lang = JSON.parse(decodeURIComponent(languageJson));
            document.getElementById('modalLanguageId').textContent = lang.id;
            document.getElementById('modalLanguageName').textContent = lang.name;
            document.getElementById('modalLanguageCode').textContent = lang.code;
            document.getElementById('modalLanguageStatus').textContent = lang.status;
            document.getElementById('modalIsDefault').textContent = lang.is_default ? 'Yes' : 'No';
            document.getElementById('modalLastUpdated').textContent = lang.last_updated || 'N/A';
            document.getElementById('modalLanguageDescription').textContent = lang.description || 'No description provided.';

            document.getElementById('detailsModal').classList.remove('hidden');
        };

        // Close language details modal
        document.getElementById('closeDetailsModal').addEventListener('click', function() {
            document.getElementById('detailsModal').classList.add('hidden');
        });

        /**
         * Simulates testing a language configuration.
         * In a real app, this might involve checking if language files are accessible or if translation services work.
         * @param {string} id - The ID of the language to test.
         */
        window.testLanguage = function(id) {
            showConfirm(`Are you sure you want to test language configuration for ${id}? This will simulate a content check.`, (confirmed) => {
                if (confirmed) {
                    showAlert(`Simulating test for language ${id}... (Check console for simulated result)`, 'Testing Language');
                    const index = languagesData.findIndex(lang => lang.id === id);
                    if (index !== -1) {
                        // Simulate test success/failure
                        const isSuccess = Math.random() > 0.1; // 90% chance of success
                        const now = new Date();
                        const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                        languagesData[index].last_updated = timestamp; // Update last_updated on test

                        if (isSuccess) {
                            console.log(`Language ${id} Test Result: SUCCESS! Content files found and accessible.`);
                            showAlert(`Language ${id} tested successfully!`, 'Test Result');
                        } else {
                            console.error(`Language ${id} Test Result: FAILED! Error: "Missing translation files or invalid encoding."`);
                            showAlert(`Language ${id} test failed! Check configuration.`, 'Test Result (Failed)');
                        }
                        filterLanguages(); // Re-render table to show updated last_updated timestamp
                    }
                }
            }, 'Test Language Configuration');
        };

        /**
         * Deletes a language.
         * @param {string} id - The ID of the language to delete.
         */
        window.deleteLanguage = function(id) {
            showConfirm(`Are you sure you want to delete language ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    const languageToDelete = languagesData.find(lang => lang.id === id);
                    if (languageToDelete && languageToDelete.is_default) {
                        showAlert('Cannot delete the default language. Please set another language as default first.', 'Deletion Error');
                        return;
                    }

                    languagesData = languagesData.filter(lang => lang.id !== id);
                    showAlert(`Language ${id} deleted successfully.`, 'Language Deleted');
                    filterLanguages(); // Re-render table
                }
            }, 'Delete Language');
        };
    });
</script>
