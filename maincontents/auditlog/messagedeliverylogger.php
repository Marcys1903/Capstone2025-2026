<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for message delivery logs.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample message delivery log data
$messageLogs = [
    [
        'message_id' => 'MSG-001',
        'sender' => 'Admin Marcus',
        'recipient' => 'John Doe (USR-001)',
        'message_preview' => 'Emergency alert: Severe weather warning...',
        'timestamp' => '2025-07-28 09:15 AM',
        'status' => 'Delivered',
        'details' => 'Message successfully delivered to John Doe via SMS and Email.',
    ],
    [
        'message_id' => 'MSG-002',
        'sender' => 'System',
        'recipient' => 'Emergency Group A',
        'message_preview' => 'Evacuation order for Sector 7...',
        'timestamp' => '2025-07-28 09:20 AM',
        'status' => 'Failed',
        'details' => 'Delivery failed for 3 recipients in Emergency Group A due to invalid contact information.',
    ],
    [
        'message_id' => 'MSG-003',
        'sender' => 'Admin Jane',
        'recipient' => 'Fire Department',
        'message_preview' => 'Fire incident reported at downtown...',
        'timestamp' => '2025-07-27 04:00 PM',
        'status' => 'Sent',
        'details' => 'Message sent to Fire Department. Awaiting delivery confirmation.',
    ],
    [
        'message_id' => 'MSG-004',
        'sender' => 'Admin Marcus',
        'recipient' => 'Jane Smith (USR-002)',
        'message_preview' => 'System update notification...',
        'timestamp' => '2025-07-27 11:30 AM',
        'status' => 'Delivered',
        'details' => 'Message successfully delivered to Jane Smith via Email.',
    ],
    [
        'message_id' => 'MSG-005',
        'sender' => 'System',
        'recipient' => 'Police Department',
        'message_preview' => 'Suspicious activity reported...',
        'timestamp' => '2025-07-26 10:00 AM',
        'status' => 'Delivered',
        'details' => 'Message successfully delivered to Police Department via secure channel.',
    ],
];

// Sample options for dropdowns
$senders = ['All', 'Admin Marcus', 'Admin Jane', 'System'];
$recipients = ['All', 'John Doe (USR-001)', 'Emergency Group A', 'Fire Department', 'Jane Smith (USR-002)', 'Police Department'];
$deliveryStatuses = ['All', 'Sent', 'Delivered', 'Failed'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Message Delivery Logger</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Monitor Message Delivery Status</h2>
        <p class="text-gray-700 leading-relaxed">
            The Message Delivery Logger provides a detailed record of all messages sent through the emergency communication system. This module helps in tracking delivery status, identifying communication failures, and ensuring critical information reaches its intended recipients.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Message Log</h2>

        <div class="mb-6 flex flex-wrap justify-between items-center gap-4">
            <!-- Filter Controls -->
            <div class="flex flex-wrap space-x-4 gap-y-2">
                <div>
                    <label for="filterSender" class="block text-sm font-medium text-gray-700">Filter by Sender:</label>
                    <select id="filterSender" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($senders as $sender) : ?>
                            <option value="<?php echo htmlspecialchars($sender); ?>"><?php echo htmlspecialchars($sender); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterRecipient" class="block text-sm font-medium text-gray-700">Filter by Recipient:</label>
                    <select id="filterRecipient" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($recipients as $recipient) : ?>
                            <option value="<?php echo htmlspecialchars($recipient); ?>"><?php echo htmlspecialchars($recipient); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($deliveryStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Message ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Sender</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Recipient</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Message Preview</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Timestamp</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="messageTableBody">
                    <!-- Messages will be rendered here by JavaScript -->
                    <?php if (empty($messageLogs)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No message logs found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- Message Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Message Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>Message ID:</strong> <span id="modalMessageId"></span></p>
                <p><strong>Sender:</strong> <span id="modalSender"></span></p>
                <p><strong>Recipient:</strong> <span id="modalRecipient"></span></p>
                <p><strong>Timestamp:</strong> <span id="modalTimestamp"></span></p>
                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                <p><strong>Full Message:</strong></p>
                <div id="modalFullMessage" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
                <p><strong>Delivery Details:</strong></p>
                <div id="modalDeliveryDetails" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Message Modal (re-used from other modules) -->
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

    <!-- Confirmation Modal (re-used from other modules) -->
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

</div>

<script>
    // Initial message logs data from PHP
    let messageLogsData = <?php echo json_encode($messageLogs); ?>;

    // Get references to DOM elements
    const messageTableBody = document.getElementById('messageTableBody');
    const filterSenderSelect = document.getElementById('filterSender');
    const filterRecipientSelect = document.getElementById('filterRecipient');
    const filterStatusSelect = document.getElementById('filterStatus');

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
     * Renders the message log table based on the provided data.
     * @param {Array} dataToRender - The array of message log objects to display.
     */
    function renderMessageTable(dataToRender) {
        messageTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No message logs found matching filters.</td>`;
            messageTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(log => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (log.status === 'Delivered') statusClass = 'bg-green-100 text-green-800';
            else if (log.status === 'Failed') statusClass = 'bg-red-100 text-red-800';
            else if (log.status === 'Sent') statusClass = 'bg-blue-100 text-blue-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${log.message_id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${log.sender}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${log.recipient}</td>
                <td class="px-6 py-4 text-sm text-gray-700 truncate max-w-xs">${log.message_preview}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${log.timestamp || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${log.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewMessageDetails('${encodeURIComponent(JSON.stringify(log))}')" class="text-indigo-600 hover:text-indigo-900">View Details</button>
                </td>
            `;
            messageTableBody.appendChild(row);
        });
    }

    /**
     * Filters the message log data based on selected criteria and re-renders the table.
     */
    function filterMessages() {
        const selectedSender = filterSenderSelect.value;
        const selectedRecipient = filterRecipientSelect.value;
        const selectedStatus = filterStatusSelect.value;

        const filteredData = messageLogsData.filter(log => {
            const matchesSender = selectedSender === 'All' || log.sender === selectedSender;
            const matchesRecipient = selectedRecipient === 'All' || log.recipient === selectedRecipient;
            const matchesStatus = selectedStatus === 'All' || log.status === selectedStatus;
            return matchesSender && matchesRecipient && matchesStatus;
        });

        renderMessageTable(filteredData);
    }

    // Event listeners for filter changes
    filterSenderSelect.addEventListener('change', filterMessages);
    filterRecipientSelect.addEventListener('change', filterMessages);
    filterStatusSelect.addEventListener('change', filterMessages);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderMessageTable(messageLogsData);

        // Get elements for Message Details Modal
        const detailsModal = document.getElementById('detailsModal');
        const modalMessageId = document.getElementById('modalMessageId');
        const modalSender = document.getElementById('modalSender');
        const modalRecipient = document.getElementById('modalRecipient');
        const modalTimestamp = document.getElementById('modalTimestamp');
        const modalStatus = document.getElementById('modalStatus');
        const modalFullMessage = document.getElementById('modalFullMessage');
        const modalDeliveryDetails = document.getElementById('modalDeliveryDetails');
        const closeDetailsModal = document.getElementById('closeDetailsModal');

        /**
         * Opens the message details modal with the given message log's data.
         * @param {string} messageJson - JSON string of the message log entry.
         */
        window.viewMessageDetails = function(messageJson) {
            const log = JSON.parse(decodeURIComponent(messageJson));
            modalMessageId.textContent = log.message_id;
            modalSender.textContent = log.sender;
            modalRecipient.textContent = log.recipient;
            modalTimestamp.textContent = log.timestamp || 'N/A';
            modalStatus.textContent = log.status;
            modalFullMessage.textContent = log.message_preview || 'No message content preview available.'; // Using preview as full message for simulation
            modalDeliveryDetails.textContent = log.details || 'No detailed delivery information provided.';

            detailsModal.classList.remove('hidden');
        };

        // Close message details modal
        closeDetailsModal.addEventListener('click', function() {
            detailsModal.classList.add('hidden');
        });
    });
</script>
