<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for voice translation requests.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample voice translation history data
$voiceTranslationHistory = [
    [
        'id' => 'VTR-001',
        'source_audio_desc' => 'Resident reporting flood level',
        'source_text_transcribed' => 'The water level is rising rapidly in our area.',
        'translated_text' => 'Mabilis na tumataas ang lebel ng tubig sa aming lugar.',
        'source_lang' => 'English',
        'target_lang' => 'Filipino',
        'status' => 'Completed',
        'timestamp' => '2025-07-28 12:00 PM',
        'requested_by' => 'Live Chat Agent'
    ],
    [
        'id' => 'VTR-002',
        'source_audio_desc' => 'Emergency team update',
        'source_text_transcribed' => 'We are deploying rescue boats to Barangay 3.',
        'translated_text' => 'Nagpapadala kami ng mga bangkang panligtas sa Barangay 3.',
        'source_lang' => 'English',
        'target_lang' => 'Filipino',
        'status' => 'Completed',
        'timestamp' => '2025-07-28 11:45 AM',
        'requested_by' => 'Admin Marcus'
    ],
    [
        'id' => 'VTR-003',
        'source_audio_desc' => 'Citizen asking for help',
        'source_text_transcribed' => 'Tabang! Naa mi diri sa atop!',
        'translated_text' => 'Help! We are here on the roof!',
        'source_lang' => 'Cebuano',
        'target_lang' => 'English',
        'status' => 'Pending',
        'timestamp' => '2025-07-28 11:30 AM',
        'requested_by' => 'Incident Report'
    ],
    [
        'id' => 'VTR-004',
        'source_audio_desc' => 'Weather forecast update',
        'source_text_transcribed' => 'Malakas na hangin ang inaasahan sa susunod na oras.',
        'translated_text' => 'Strong winds are expected in the next hour.',
        'source_lang' => 'Filipino',
        'target_lang' => 'English',
        'status' => 'Failed',
        'timestamp' => '2025-07-27 05:00 PM',
        'requested_by' => 'System Auto'
    ]
];

// Sample options for dropdowns
$languages = ['English', 'Filipino', 'Cebuano', 'Ilokano', 'Japanese', 'Spanish', 'Other'];
$translationStatuses = ['All', 'Completed', 'Pending', 'Failed'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Voice Translation Engine</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Translate Spoken Content Using AI</h2>
        <p class="text-gray-700 leading-relaxed">
            The Voice Translation Engine module facilitates real-time or near real-time translation of spoken content, converting audio inputs into text and then translating them into a target language. This is vital for bridging language barriers in urgent voice communications, such as emergency calls or field reports.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">New Voice Translation Request</h2>
        <button onclick="openRequestModal()" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Request New Voice Translation
        </button>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Voice Translation History</h2>

        <div class="mb-6 flex space-x-4">
            <div>
                <label for="filterSourceLang" class="block text-sm font-medium text-gray-700">Filter by Source Language:</label>
                <select id="filterSourceLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="All">All</option>
                    <?php foreach ($languages as $lang) : ?>
                        <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="filterTargetLang" class="block text-sm font-medium text-gray-700">Filter by Target Language:</label>
                <select id="filterTargetLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="All">All</option>
                    <?php foreach ($languages as $lang) : ?>
                        <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <?php foreach ($translationStatuses as $status) : ?>
                        <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Source Audio Desc</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Source Lang</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Target Lang</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Timestamp</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="voiceTranslationTableBody">
                    <!-- Voice translation history will be rendered here by JavaScript -->
                    <?php if (empty($voiceTranslationHistory)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No voice translation history found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- Voice Translation Request Modal -->
    <div id="requestModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">New Voice Translation Request</h3>
            <form id="voiceTranslationRequestForm" onsubmit="return submitVoiceTranslationRequest(event)">
                <div class="mb-4">
                    <label for="sourceAudioInput" class="block text-sm font-medium text-gray-700">Source Audio (Simulated Text Input)</label>
                    <textarea id="sourceAudioInput" rows="5" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter spoken words to simulate audio input" required></textarea>
                    <p class="mt-1 text-xs text-gray-500">In a real application, this would be an audio file upload or live microphone input.</p>
                </div>
                <div class="mb-4">
                    <label for="sourceLang" class="block text-sm font-medium text-gray-700">Source Language</label>
                    <select id="sourceLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach ($languages as $lang) : ?>
                            <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="targetLang" class="block text-sm font-medium text-gray-700">Target Language</label>
                    <select id="targetLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach ($languages as $lang) : ?>
                            <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeRequestModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" id="voiceTranslateButton" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Translate Voice
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Voice Translation Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Voice Translation Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalVoiceTranslationId"></span></p>
                <p><strong>Source Audio Description:</strong> <span id="modalSourceAudioDesc"></span></p>
                <p><strong>Source Language:</strong> <span id="modalSourceLang"></span></p>
                <p><strong>Target Language:</strong> <span id="modalTargetLang"></span></p>
                <p><strong>Status:</strong> <span id="modalVoiceTranslationStatus"></span></p>
                <p><strong>Timestamp:</strong> <span id="modalTimestamp"></span></p>
                <p><strong>Requested By:</strong> <span id="modalRequestedBy"></span></p>
                <p><strong>Transcribed Source Text:</strong></p>
                <div id="modalSourceTextTranscribed" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
                <p><strong>Translated Text:</strong></p>
                <div id="modalTranslatedText" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
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
    // Initial voice translation history data from PHP
    let voiceTranslationHistoryData = <?php echo json_encode($voiceTranslationHistory); ?>;
    const adminUserName = "<?php echo htmlspecialchars($userName); ?>"; // Get admin username from PHP

    // Get references to DOM elements
    const voiceTranslationTableBody = document.getElementById('voiceTranslationTableBody');
    const filterSourceLangSelect = document.getElementById('filterSourceLang');
    const filterTargetLangSelect = document.getElementById('filterTargetLang');
    const filterStatusSelect = document.getElementById('filterStatus');

    // Voice Translation Request Modal elements
    const requestModal = document.getElementById('requestModal');
    const sourceAudioInputField = document.getElementById('sourceAudioInput');
    const sourceLangField = document.getElementById('sourceLang');
    const targetLangField = document.getElementById('targetLang');
    const voiceTranslateButton = document.getElementById('voiceTranslateButton');

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
     * Renders the voice translation history table based on the provided data.
     * @param {Array} dataToRender - The array of translation objects to display.
     */
    function renderVoiceTranslationTable(dataToRender) {
        voiceTranslationTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No voice translation history found matching filters.</td>`;
            voiceTranslationTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(translation => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (translation.status === 'Completed') statusClass = 'bg-green-100 text-green-800';
            else if (translation.status === 'Pending') statusClass = 'bg-yellow-100 text-yellow-800';
            else if (translation.status === 'Failed') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${translation.id}</td>
                <td class="px-6 py-4 text-sm text-gray-700 truncate max-w-xs">${translation.source_audio_desc.substring(0, 50)}...</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${translation.source_lang}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${translation.target_lang}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${translation.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${translation.timestamp || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewVoiceTranslationDetails('${encodeURIComponent(JSON.stringify(translation))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="deleteVoiceTranslation('${translation.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            voiceTranslationTableBody.appendChild(row);
        });
    }

    /**
     * Filters the voice translation history data based on selected criteria and re-renders the table.
     */
    function filterVoiceTranslations() {
        const selectedSourceLang = filterSourceLangSelect.value;
        const selectedTargetLang = filterTargetLangSelect.value;
        const selectedStatus = filterStatusSelect.value;

        const filteredData = voiceTranslationHistoryData.filter(translation => {
            const matchesSourceLang = selectedSourceLang === 'All' || translation.source_lang === selectedSourceLang;
            const matchesTargetLang = selectedTargetLang === 'All' || translation.target_lang === selectedTargetLang;
            const matchesStatus = selectedStatus === 'All' || translation.status === selectedStatus;
            return matchesSourceLang && matchesTargetLang && matchesStatus;
        });

        renderVoiceTranslationTable(filteredData);
    }

    // Event listeners for filter changes
    filterSourceLangSelect.addEventListener('change', filterVoiceTranslations);
    filterTargetLangSelect.addEventListener('change', filterVoiceTranslations);
    filterStatusSelect.addEventListener('change', filterVoiceTranslations);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderVoiceTranslationTable(voiceTranslationHistoryData);

        /**
         * Opens the new voice translation request modal.
         */
        window.openRequestModal = function() {
            requestModal.classList.remove('hidden');
            sourceAudioInputField.value = '';
            sourceLangField.value = 'English'; // Default
            targetLangField.value = 'Filipino'; // Default
        };

        /**
         * Closes the new voice translation request modal.
         */
        window.closeRequestModal = function() {
            requestModal.classList.add('hidden');
        };

        /**
         * Simulates submitting a voice translation request using an LLM.
         * @param {Event} event - The form submission event.
         */
        window.submitVoiceTranslationRequest = async function(event) {
            event.preventDefault(); // Prevent default form submission

            const sourceAudioInput = sourceAudioInputField.value.trim();
            const sourceLang = sourceLangField.value;
            const targetLang = targetLangField.value;

            if (!sourceAudioInput || !sourceLang || !targetLang) {
                showAlert('Please enter simulated spoken words and select languages.', 'Input Error');
                return false;
            }
            if (sourceLang === targetLang) {
                showAlert('Source and Target languages cannot be the same.', 'Input Error');
                return false;
            }

            voiceTranslateButton.textContent = 'Translating...';
            voiceTranslateButton.disabled = true;

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            let newTranslation = {
                id: 'VTR-' + (voiceTranslationHistoryData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                source_audio_desc: sourceAudioInput.substring(0, 50) + (sourceAudioInput.length > 50 ? '...' : ''), // Use input as description
                source_text_transcribed: sourceAudioInput, // Simulated transcription
                translated_text: 'Translating...', // Placeholder while processing
                source_lang: sourceLang,
                target_lang: targetLang,
                status: 'Pending',
                timestamp: timestamp,
                requested_by: adminUserName
            };

            voiceTranslationHistoryData.unshift(newTranslation); // Add to top of list
            filterVoiceTranslations(); // Re-render to show pending translation
            closeRequestModal();

            try {
                // Simulate LLM API call for translation
                // First, simulate transcription (already done by sourceAudioInput)
                // Then, translate the transcribed text
                const prompt = `Translate the following spoken text from ${sourceLang} to ${targetLang}: "${sourceAudioInput}"`;
                let chatHistory = [];
                chatHistory.push({ role: "user", parts: [{ text: prompt }] });
                const payload = { contents: chatHistory };
                const apiKey = ""; // Canvas will provide this
                const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=${apiKey}`;

                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });

                const result = await response.json();

                let translatedText = 'Translation failed.';
                let status = 'Failed';

                if (result.candidates && result.candidates.length > 0 &&
                    result.candidates[0].content && result.candidates[0].content.parts &&
                    result.candidates[0].content.parts.length > 0) {
                    translatedText = result.candidates[0].content.parts[0].text;
                    status = 'Completed';
                } else {
                    console.error('LLM response structure unexpected:', result);
                    showAlert('Voice translation failed: Unexpected API response.', 'Translation Error');
                }

                // Update the newly added translation entry
                const index = voiceTranslationHistoryData.findIndex(t => t.id === newTranslation.id);
                if (index !== -1) {
                    voiceTranslationHistoryData[index].translated_text = translatedText;
                    voiceTranslationHistoryData[index].status = status;
                    voiceTranslationHistoryData[index].timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                }

                filterVoiceTranslations(); // Re-render with updated status and text
                showAlert(`Voice Translation ${newTranslation.id} ${status}!`, 'Translation Result');

            } catch (error) {
                console.error('Error during voice translation API call:', error);
                // Update the status to failed if an error occurs
                const index = voiceTranslationHistoryData.findIndex(t => t.id === newTranslation.id);
                if (index !== -1) {
                    voiceTranslationHistoryData[index].translated_text = 'Voice translation failed due to network error.';
                    voiceTranslationHistoryData[index].status = 'Failed';
                    voiceTranslationHistoryData[index].timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                }
                filterVoiceTranslations();
                showAlert('Voice translation failed: Network error or API issue.', 'Translation Error');
            } finally {
                voiceTranslateButton.textContent = 'Translate Voice';
                voiceTranslateButton.disabled = false;
            }
            return false;
        };

        /**
         * Opens the voice translation details modal with the given translation's data.
         * @param {string} translationJson - JSON string of the translation entry.
         */
        window.viewVoiceTranslationDetails = function(translationJson) {
            const translation = JSON.parse(decodeURIComponent(translationJson));
            document.getElementById('modalVoiceTranslationId').textContent = translation.id;
            document.getElementById('modalSourceAudioDesc').textContent = translation.source_audio_desc || 'N/A';
            document.getElementById('modalSourceLang').textContent = translation.source_lang;
            document.getElementById('modalTargetLang').textContent = translation.target_lang;
            document.getElementById('modalVoiceTranslationStatus').textContent = translation.status;
            document.getElementById('modalTimestamp').textContent = translation.timestamp || 'N/A';
            document.getElementById('modalRequestedBy').textContent = translation.requested_by || 'N/A';
            document.getElementById('modalSourceTextTranscribed').textContent = translation.source_text_transcribed || 'No transcribed text available.';
            document.getElementById('modalTranslatedText').textContent = translation.translated_text || 'No translated text available.';

            document.getElementById('detailsModal').classList.remove('hidden');
        };

        // Close voice translation details modal
        document.getElementById('closeDetailsModal').addEventListener('click', function() {
            document.getElementById('detailsModal').classList.add('hidden');
        });

        /**
         * Deletes a voice translation entry from the history.
         * @param {string} id - The ID of the translation to delete.
         */
        window.deleteVoiceTranslation = function(id) {
            showConfirm(`Are you sure you want to delete voice translation ${id} from history? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    voiceTranslationHistoryData = voiceTranslationHistoryData.filter(t => t.id !== id);
                    showAlert(`Voice translation ${id} deleted successfully.`, 'Deletion Successful');
                    filterVoiceTranslations(); // Re-render table
                }
            }, 'Delete Voice Translation');
        };
    });
</script>
