<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for contact channel configurations.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample contact channel data
$contactChannels = [
    [
        'id' => 'CCL-001',
        'name' => 'SMS for Residents',
        'channel_type' => 'SMS',
        'associated_group' => 'Residents',
        'status' => 'Active',
        'last_updated' => '2025-07-28 04:00 PM',
        'description' => 'Default SMS channel for all registered residents for critical alerts.'
    ],
    [
        'id' => 'CCL-002',
        'name' => 'Email for Emergency Staff',
        'channel_type' => 'Email',
        'associated_group' => 'Emergency Staff',
        'status' => 'Active',
        'last_updated' => '2025-07-28 03:45 PM',
        'description' => 'Primary email channel for internal communications and detailed reports to emergency staff.'
    ],
    [
        'id' => 'CCL-003',
        'name' => 'App Push for Volunteers',
        'channel_type' => 'App Push',
        'associated_group' => 'Volunteers',
        'status' => 'Inactive',
        'last_updated' => '2025-07-27 11:00 AM',
        'description' => 'Mobile app push notifications for volunteer coordination, currently inactive.'
    ],
    [
        'id' => 'CCL-004',
        'name' => 'Automated Call for Elderly',
        'channel_type' => 'Call',
        'associated_group' => 'Elderly Residents',
        'status' => 'Active',
        'last_updated' => '2025-07-27 02:00 PM',
        'description' => 'Automated voice calls for elderly residents during critical emergencies.'
    ]
];

// Sample options for dropdowns
$channelTypes = ['All', 'SMS', 'Email', 'Call', 'App Push', 'Other'];
$associatedGroups = ['All', 'Residents', 'Emergency Staff', 'Volunteers', 'Elderly Residents', 'General Public', 'Other'];
$channelStatuses = ['All', 'Active', 'Inactive'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Contact Channel Selector</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage Communication Channels for User Groups</h2>
        <p class="text-gray-700 leading-relaxed">
            The Contact Channel Selector module allows administrators to define and manage preferred communication channels for different user groups. This ensures that messages are delivered through the most effective and appropriate means for each recipient segment, optimizing reach and response during emergencies.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Configured Contact Channels</h2>

        <div class="mb-6 flex justify-between items-center">
            <!-- Filter Controls -->
            <div class="flex space-x-4">
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($channelStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterChannelType" class="block text-sm font-medium text-gray-700">Filter by Channel Type:</label>
                    <select id="filterChannelType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($channelTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterAssociatedGroup" class="block text-sm font-medium text-gray-700">Filter by Associated Group:</label>
                    <select id="filterAssociatedGroup" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($associatedGroups as $group) : ?>
                            <option value="<?php echo htmlspecialchars($group); ?>"><?php echo htmlspecialchars($group); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Channel Setting
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Channel Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Associated Group</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Updated</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="channelTableBody">
                    <!-- Channels will be rendered here by JavaScript -->
                    <?php if (empty($contactChannels)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No contact channel settings configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- Channel Configuration Modal (Add/Edit) -->
    <div id="configModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="configModalTitle">Add New Channel Setting</h3>
            <form id="configForm" onsubmit="return saveChannel(event)">
                <input type="hidden" id="channelId">
                <div class="mb-4">
                    <label for="channelName" class="block text-sm font-medium text-gray-700">Setting Name</label>
                    <input type="text" id="channelName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="channelType" class="block text-sm font-medium text-gray-700">Channel Type</label>
                    <select id="channelType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($channelTypes, 1) as $type) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="associatedGroup" class="block text-sm font-medium text-gray-700">Associated Group</label>
                    <select id="associatedGroup" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($associatedGroups, 1) as $group) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($group); ?>"><?php echo htmlspecialchars($group); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="channelDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="channelDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this channel setting"></textarea>
                </div>
                <div class="mb-4">
                    <label for="channelStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="channelStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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

    <!-- Channel Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Contact Channel Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalChannelId"></span></p>
                <p><strong>Name:</strong> <span id="modalChannelName"></span></p>
                <p><strong>Channel Type:</strong> <span id="modalChannelType"></span></p>
                <p><strong>Associated Group:</strong> <span id="modalAssociatedGroup"></span></p>
                <p><strong>Status:</strong> <span id="modalChannelStatus"></span></p>
                <p><strong>Last Updated:</strong> <span id="modalLastUpdated"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalChannelDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
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
    // Initial contact channel data from PHP
    let contactChannelsData = <?php echo json_encode($contactChannels); ?>;

    // Get references to DOM elements
    const channelTableBody = document.getElementById('channelTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterChannelTypeSelect = document.getElementById('filterChannelType');
    const filterAssociatedGroupSelect = document.getElementById('filterAssociatedGroup');

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
     * Renders the contact channel table based on the provided data.
     * @param {Array} dataToRender - The array of channel objects to display.
     */
    function renderChannelTable(dataToRender) {
        channelTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No contact channel settings configured matching filters.</td>`;
            channelTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(channel => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (channel.status === 'Active') statusClass = 'bg-green-100 text-green-800';
            else if (channel.status === 'Inactive') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${channel.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${channel.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${channel.channel_type}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${channel.associated_group}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${channel.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${channel.last_updated || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewDetails('${encodeURIComponent(JSON.stringify(channel))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openConfigModal('edit', '${encodeURIComponent(JSON.stringify(channel))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="testChannel('${channel.id}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Test</button>
                    <button onclick="deleteChannel('${channel.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            channelTableBody.appendChild(row);
        });
    }

    /**
     * Filters the contact channel data based on selected criteria and re-renders the table.
     */
    function filterChannels() {
        const selectedStatus = filterStatusSelect.value;
        const selectedChannelType = filterChannelTypeSelect.value;
        const selectedAssociatedGroup = filterAssociatedGroupSelect.value;

        const filteredData = contactChannelsData.filter(channel => {
            const matchesStatus = selectedStatus === 'All' || channel.status === selectedStatus;
            const matchesChannelType = selectedChannelType === 'All' || channel.channel_type === selectedChannelType;
            const matchesAssociatedGroup = selectedAssociatedGroup === 'All' || channel.associated_group === selectedAssociatedGroup;
            return matchesStatus && matchesChannelType && matchesAssociatedGroup;
        });

        renderChannelTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterChannels);
    filterChannelTypeSelect.addEventListener('change', filterChannels);
    filterAssociatedGroupSelect.addEventListener('change', filterChannels);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderChannelTable(contactChannelsData);

        // Get elements for Channel Config Modal
        const configModal = document.getElementById('configModal');
        const configModalTitle = document.getElementById('configModalTitle');
        const channelIdField = document.getElementById('channelId');
        const channelNameField = document.getElementById('channelName');
        const channelTypeField = document.getElementById('channelType');
        const associatedGroupField = document.getElementById('associatedGroup');
        const channelDescriptionField = document.getElementById('channelDescription');
        const channelStatusField = document.getElementById('channelStatus');

        /**
         * Opens the channel configuration modal for adding new or editing existing channels.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [channelJson=null] - JSON string of the channel data if in 'edit' mode.
         */
        window.openConfigModal = function(mode, channelJson = null) {
            configModal.classList.remove('hidden');
            if (mode === 'new') {
                configModalTitle.textContent = 'Add New Channel Setting';
                channelIdField.value = '';
                channelNameField.value = '';
                channelTypeField.value = 'SMS'; // Default
                associatedGroupField.value = 'Residents'; // Default
                channelDescriptionField.value = '';
                channelStatusField.value = 'Active';
            } else if (mode === 'edit' && channelJson) {
                const channel = JSON.parse(decodeURIComponent(channelJson));
                configModalTitle.textContent = 'Edit Channel Setting';
                channelIdField.value = channel.id;
                channelNameField.value = channel.name;
                channelTypeField.value = channel.channel_type;
                associatedGroupField.value = channel.associated_group;
                channelDescriptionField.value = channel.description;
                channelStatusField.value = channel.status;
            }
        };

        /**
         * Closes the channel configuration modal.
         */
        window.closeConfigModal = function() {
            configModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) a contact channel.
         * @param {Event} event - The form submission event.
         */
        window.saveChannel = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = channelIdField.value;
            const name = channelNameField.value.trim();
            const channel_type = channelTypeField.value;
            const associated_group = associatedGroupField.value;
            const description = channelDescriptionField.value.trim();
            const status = channelStatusField.value;

            if (!name || !channel_type || !associated_group) {
                showAlert('Please fill in all required fields (Setting Name, Channel Type, Associated Group).', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newChannel = {
                id: id || 'CCL-' + (contactChannelsData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                channel_type: channel_type,
                associated_group: associated_group,
                status: status,
                last_updated: timestamp,
                description: description
            };

            if (id) {
                // Update existing
                const index = contactChannelsData.findIndex(channel => channel.id === id);
                if (index !== -1) {
                    contactChannelsData[index] = newChannel;
                    showAlert(`Contact Channel Setting "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                contactChannelsData.push(newChannel);
                showAlert(`Contact Channel Setting "${name}" added successfully!`, 'Success');
            }

            closeConfigModal();
            filterChannels(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the channel details modal with the given channel's data.
         * @param {string} channelJson - JSON string of the channel entry.
         */
        window.viewDetails = function(channelJson) {
            const channel = JSON.parse(decodeURIComponent(channelJson));
            document.getElementById('modalChannelId').textContent = channel.id;
            document.getElementById('modalChannelName').textContent = channel.name;
            document.getElementById('modalChannelType').textContent = channel.channel_type;
            document.getElementById('modalAssociatedGroup').textContent = channel.associated_group;
            document.getElementById('modalChannelStatus').textContent = channel.status;
            document.getElementById('modalLastUpdated').textContent = channel.last_updated || 'N/A';
            document.getElementById('modalChannelDescription').textContent = channel.description || 'No description provided.';

            document.getElementById('detailsModal').classList.remove('hidden');
        };

        // Close channel details modal
        document.getElementById('closeDetailsModal').addEventListener('click', function() {
            document.getElementById('detailsModal').classList.add('hidden');
        });

        /**
         * Simulates testing a contact channel.
         * In a real app, this might involve sending a test message through the channel.
         * @param {string} id - The ID of the channel to test.
         */
        window.testChannel = function(id) {
            showConfirm(`Are you sure you want to test contact channel ${id}? This will simulate a test message delivery.`, (confirmed) => {
                if (confirmed) {
                    showAlert(`Simulating test for channel ${id}... (Check console for simulated result)`, 'Testing Channel');
                    const index = contactChannelsData.findIndex(c => c.id === id);
                    if (index !== -1) {
                        // Simulate test success/failure
                        const isSuccess = Math.random() > 0.1; // 90% chance of success
                        const now = new Date();
                        const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                        contactChannelsData[index].last_updated = timestamp; // Update last_updated on test

                        if (isSuccess) {
                            console.log(`Channel ${id} Test Result: SUCCESS! Test message delivered.`);
                            showAlert(`Channel ${id} tested successfully!`, 'Test Result');
                        } else {
                            console.error(`Channel ${id} Test Result: FAILED! Error: "Channel unreachable or invalid configuration."`);
                            showAlert(`Channel ${id} test failed! Check configuration.`, 'Test Result (Failed)');
                        }
                        filterChannels(); // Re-render table to show updated last_updated timestamp
                    }
                }
            }, 'Test Contact Channel');
        };

        /**
         * Deletes a contact channel setting.
         * @param {string} id - The ID of the channel to delete.
         */
        window.deleteChannel = function(id) {
            showConfirm(`Are you sure you want to delete contact channel setting ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    contactChannelsData = contactChannelsData.filter(channel => channel.id !== id);
                    showAlert(`Contact channel setting ${id} deleted successfully.`, 'Setting Deleted');
                    filterChannels(); // Re-render table
                }
            }, 'Delete Contact Channel Setting');
        };
    });
</script>
