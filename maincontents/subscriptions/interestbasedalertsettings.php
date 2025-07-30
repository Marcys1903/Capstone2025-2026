<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for interest-based alert settings.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample interest categories
$interestCategories = [
    'Flood Alerts', 'Earthquake Warnings', 'Typhoon Updates', 'Traffic Advisories',
    'Public Health Notices', 'Community Events', 'Security Alerts', 'Fire Incidents'
];

// Sample user interest settings
$userInterests = [
    [
        'id' => 'INT-001',
        'user_id' => 'USR-001',
        'user_name' => 'John Doe',
        'interests' => ['Flood Alerts', 'Traffic Advisories'],
        'notification_channels' => ['SMS', 'Email'],
        'status' => 'Active',
        'last_updated' => '2025-07-28 02:00 PM',
        'description' => 'John Doe wants flood and traffic alerts via SMS and Email.'
    ],
    [
        'id' => 'INT-002',
        'user_id' => 'USR-002',
        'user_name' => 'Jane Smith',
        'interests' => ['Earthquake Warnings', 'Security Alerts', 'Public Health Notices'],
        'notification_channels' => ['App Push', 'Email'],
        'status' => 'Active',
        'last_updated' => '2025-07-28 01:45 PM',
        'description' => 'Jane Smith is an emergency responder interested in critical alerts.'
    ],
    [
        'id' => 'INT-003',
        'user_id' => 'USR-004',
        'user_name' => 'Pending User',
        'interests' => [],
        'notification_channels' => [],
        'status' => 'Pending',
        'last_updated' => '2025-07-27 09:00 AM',
        'description' => 'New user, no interests set yet.'
    ]
];

// Sample options for dropdowns
$settingStatuses = ['All', 'Active', 'Inactive'];
$availableChannels = ['SMS', 'Email', 'App Push', 'Chat'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Interest-Based Alert Settings</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Personalize Alert Delivery Based on User Interests</h2>
        <p class="text-gray-700 leading-relaxed">
            The Interest-Based Alert Settings module allows administrators to configure and manage user preferences for receiving alerts. By defining interest categories and assigning them to users, the system can deliver more targeted and relevant notifications, reducing alert fatigue and improving recipient engagement.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">User Alert Preferences</h2>

        <div class="mb-6 flex justify-between items-center">
            <!-- Filter Controls -->
            <div class="flex space-x-4">
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($settingStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterInterest" class="block text-sm font-medium text-gray-700">Filter by Interest:</label>
                    <select id="filterInterest" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="All">All Interests</option>
                        <?php foreach ($interestCategories as $category) : ?>
                            <option value="<?php echo htmlspecialchars($category); ?>"><?php echo htmlspecialchars($category); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Setting
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Interests</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Channels</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Updated</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="settingsTableBody">
                    <!-- Settings will be rendered here by JavaScript -->
                    <?php if (empty($userInterests)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No interest-based alert settings configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- Setting Configuration Modal (Add/Edit) -->
    <div id="configModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="configModalTitle">Add New Alert Setting</h3>
            <form id="configForm" onsubmit="return saveSetting(event)">
                <input type="hidden" id="settingId">
                <input type="hidden" id="settingUserId">
                <div class="mb-4">
                    <label for="settingUserName" class="block text-sm font-medium text-gray-700">User Name (for existing users)</label>
                    <input type="text" id="settingUserName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., John Doe" required>
                    <p class="mt-1 text-xs text-gray-500">Enter the name of an existing user to link this setting.</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Interests</label>
                    <div class="mt-1 grid grid-cols-2 gap-2">
                        <?php foreach ($interestCategories as $category) : ?>
                            <div class="flex items-center">
                                <input type="checkbox" id="interest_<?php echo str_replace(' ', '_', $category); ?>" name="interests[]" value="<?php echo htmlspecialchars($category); ?>" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="interest_<?php echo str_replace(' ', '_', $category); ?>" class="ml-2 block text-sm text-gray-900"><?php echo htmlspecialchars($category); ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Notification Channels</label>
                    <div class="mt-1 grid grid-cols-2 gap-2">
                        <?php foreach ($availableChannels as $channel) : ?>
                            <div class="flex items-center">
                                <input type="checkbox" id="channel_<?php echo str_replace(' ', '_', $channel); ?>" name="channels[]" value="<?php echo htmlspecialchars($channel); ?>" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="channel_<?php echo str_replace(' ', '_', $channel); ?>" class="ml-2 block text-sm text-gray-900"><?php echo htmlspecialchars($channel); ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="settingDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="settingDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this alert setting"></textarea>
                </div>
                <div class="mb-4">
                    <label for="settingStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="settingStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save Setting
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Setting Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Alert Setting Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalSettingId"></span></p>
                <p><strong>User ID:</strong> <span id="modalSettingUserId"></span></p>
                <p><strong>User Name:</strong> <span id="modalSettingUserName"></span></p>
                <p><strong>Interests:</strong> <span id="modalInterests"></span></p>
                <p><strong>Notification Channels:</strong> <span id="modalNotificationChannels"></span></p>
                <p><strong>Status:</strong> <span id="modalSettingStatus"></span></p>
                <p><strong>Last Updated:</strong> <span id="modalLastUpdated"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalSettingDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
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
    // Initial user interests data from PHP
    let userInterestsData = <?php echo json_encode($userInterests); ?>;
    const allInterestCategories = <?php echo json_encode($interestCategories); ?>;
    const allAvailableChannels = <?php echo json_encode($availableChannels); ?>;

    // Get references to DOM elements
    const settingsTableBody = document.getElementById('settingsTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterInterestSelect = document.getElementById('filterInterest');

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
     * Renders the alert settings table based on the provided data.
     * @param {Array} dataToRender - The array of setting objects to display.
     */
    function renderSettingsTable(dataToRender) {
        settingsTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No interest-based alert settings found matching filters.</td>`;
            settingsTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(setting => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (setting.status === 'Active') statusClass = 'bg-green-100 text-green-800';
            else if (setting.status === 'Pending') statusClass = 'bg-yellow-100 text-yellow-800';
            else if (setting.status === 'Inactive') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${setting.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${setting.user_name}</td>
                <td class="px-6 py-4 text-sm text-gray-700">${setting.interests.join(', ') || 'None'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${setting.notification_channels.join(', ') || 'None'}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${setting.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${setting.last_updated || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewDetails('${encodeURIComponent(JSON.stringify(setting))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openConfigModal('edit', '${encodeURIComponent(JSON.stringify(setting))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="deleteSetting('${setting.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            settingsTableBody.appendChild(row);
        });
    }

    /**
     * Filters the alert settings data based on selected criteria and re-renders the table.
     */
    function filterSettings() {
        const selectedStatus = filterStatusSelect.value;
        const selectedInterest = filterInterestSelect.value;

        const filteredData = userInterestsData.filter(setting => {
            const matchesStatus = selectedStatus === 'All' || setting.status === selectedStatus;
            const matchesInterest = selectedInterest === 'All' || setting.interests.includes(selectedInterest);
            return matchesStatus && matchesInterest;
        });

        renderSettingsTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterSettings);
    filterInterestSelect.addEventListener('change', filterSettings);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderSettingsTable(userInterestsData);

        // Get elements for Setting Config Modal
        const configModal = document.getElementById('configModal');
        const configModalTitle = document.getElementById('configModalTitle');
        const settingIdField = document.getElementById('settingId');
        const settingUserIdField = document.getElementById('settingUserId');
        const settingUserNameField = document.getElementById('settingUserName');
        const interestsCheckboxes = document.querySelectorAll('input[name="interests[]"]');
        const channelsCheckboxes = document.querySelectorAll('input[name="channels[]"]');
        const settingDescriptionField = document.getElementById('settingDescription');
        const settingStatusField = document.getElementById('settingStatus');

        /**
         * Resets all checkboxes in a given NodeList.
         * @param {NodeList} checkboxes - The NodeList of checkbox elements.
         */
        function resetCheckboxes(checkboxes) {
            checkboxes.forEach(cb => cb.checked = false);
        }

        /**
         * Sets checkboxes based on an array of values.
         * @param {NodeList} checkboxes - The NodeList of checkbox elements.
         * @param {Array} values - An array of values to check.
         */
        function setCheckboxes(checkboxes, values) {
            resetCheckboxes(checkboxes);
            values.forEach(value => {
                const checkbox = document.querySelector(`input[name="${checkboxes[0].name}"][value="${value}"]`);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }

        /**
         * Opens the setting configuration modal for adding new or editing existing settings.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [settingJson=null] - JSON string of the setting data if in 'edit' mode.
         */
        window.openConfigModal = function(mode, settingJson = null) {
            configModal.classList.remove('hidden');
            if (mode === 'new') {
                configModalTitle.textContent = 'Add New Alert Setting';
                settingIdField.value = '';
                settingUserIdField.value = ''; // Will be generated or looked up
                settingUserNameField.value = '';
                resetCheckboxes(interestsCheckboxes);
                resetCheckboxes(channelsCheckboxes);
                settingDescriptionField.value = '';
                settingStatusField.value = 'Active';
            } else if (mode === 'edit' && settingJson) {
                const setting = JSON.parse(decodeURIComponent(settingJson));
                configModalTitle.textContent = 'Edit Alert Setting';
                settingIdField.value = setting.id;
                settingUserIdField.value = setting.user_id;
                settingUserNameField.value = setting.user_name;
                setCheckboxes(interestsCheckboxes, setting.interests);
                setCheckboxes(channelsCheckboxes, setting.notification_channels);
                settingDescriptionField.value = setting.description;
                settingStatusField.value = setting.status;
            }
        };

        /**
         * Closes the setting configuration modal.
         */
        window.closeConfigModal = function() {
            configModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) an alert setting.
         * @param {Event} event - The form submission event.
         */
        window.saveSetting = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = settingIdField.value;
            const userName = settingUserNameField.value.trim();
            const selectedInterests = Array.from(interestsCheckboxes)
                                        .filter(cb => cb.checked)
                                        .map(cb => cb.value);
            const selectedChannels = Array.from(channelsCheckboxes)
                                        .filter(cb => cb.checked)
                                        .map(cb => cb.value);
            const description = settingDescriptionField.value.trim();
            const status = settingStatusField.value;

            if (!userName || selectedInterests.length === 0 || selectedChannels.length === 0) {
                showAlert('Please fill in User Name and select at least one Interest and one Notification Channel.', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newSetting = {
                id: id || 'INT-' + (userInterestsData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                user_id: settingUserIdField.value || 'USR-AUTO-' + Math.random().toString(36).substring(2, 8).toUpperCase(), // Simulated user ID
                user_name: userName,
                interests: selectedInterests,
                notification_channels: selectedChannels,
                status: status,
                last_updated: timestamp,
                description: description
            };

            if (id) {
                // Update existing
                const index = userInterestsData.findIndex(setting => setting.id === id);
                if (index !== -1) {
                    userInterestsData[index] = newSetting;
                    showAlert(`Alert setting for "${userName}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                userInterestsData.push(newSetting);
                showAlert(`Alert setting for "${userName}" added successfully!`, 'Success');
            }

            closeConfigModal();
            filterSettings(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the setting details modal with the given setting's data.
         * @param {string} settingJson - JSON string of the setting entry.
         */
        window.viewDetails = function(settingJson) {
            const setting = JSON.parse(decodeURIComponent(settingJson));
            document.getElementById('modalSettingId').textContent = setting.id;
            document.getElementById('modalSettingUserId').textContent = setting.user_id || 'N/A';
            document.getElementById('modalSettingUserName').textContent = setting.user_name;
            document.getElementById('modalInterests').textContent = setting.interests.join(', ') || 'None';
            document.getElementById('modalNotificationChannels').textContent = setting.notification_channels.join(', ') || 'None';
            document.getElementById('modalSettingStatus').textContent = setting.status;
            document.getElementById('modalLastUpdated').textContent = setting.last_updated || 'N/A';
            document.getElementById('modalSettingDescription').textContent = setting.description || 'No description provided.';

            document.getElementById('detailsModal').classList.remove('hidden');
        };

        // Close setting details modal
        document.getElementById('closeDetailsModal').addEventListener('click', function() {
            document.getElementById('detailsModal').classList.add('hidden');
        });

        /**
         * Deletes an alert setting.
         * @param {string} id - The ID of the setting to delete.
         */
        window.deleteSetting = function(id) {
            showConfirm(`Are you sure you want to delete alert setting ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    userInterestsData = userInterestsData.filter(setting => setting.id !== id);
                    showAlert(`Alert setting ${id} deleted successfully.`, 'Setting Deleted');
                    filterSettings(); // Re-render table
                }
            }, 'Delete Alert Setting');
        };
    });
</script>
