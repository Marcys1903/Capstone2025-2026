<?php
// --- PHP PLACEHOLDER LOGIC ---
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample auto-responder rules
$autoResponders = [
    [
        'id' => 'AR-001',
        'name' => 'Flood Keyword Response',
        'trigger' => 'Keyword: "flood", "baha"',
        'response' => 'If you are in a flood-prone area, please move to higher ground. Follow local LGU instructions for evacuation.',
        'channels' => ['SMS', 'Chat'],
        'status' => 'Active'
    ],
    [
        'id' => 'AR-002',
        'name' => 'Earthquake Safety Tips',
        'trigger' => 'Event Type: Earthquake',
        'response' => 'In case of an earthquake, remember "Drop, Cover, and Hold On." Stay away from windows and heavy furniture.',
        'channels' => ['SMS'],
        'status' => 'Active'
    ],
    [
        'id' => 'AR-003',
        'name' => 'General Inquiry (Off-hours)',
        'trigger' => 'Time: Off-hours',
        'response' => 'Thank you for your message. Our team is currently offline. For urgent matters, please call [EmergencyNumber]. We will respond during business hours.',
        'channels' => ['Chat', 'Email'],
        'status' => 'Inactive'
    ],
];
?>
<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Auto-Responder Engine</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Automate Responses to Inquiries & Events</h2>
        <p class="text-gray-700 leading-relaxed">
            Configure automated responses that are triggered by specific keywords, event types, or time conditions. This ensures timely information dissemination and reduces manual workload.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Manage Auto-Responder Rules</h2>
        <div class="mb-6 text-right">
            <button onclick="openAutoResponderModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Create New Rule
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rule Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Trigger</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Channels</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($autoResponders)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No auto-responder rules defined.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($autoResponders as $rule) : ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($rule['name']); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?php echo htmlspecialchars($rule['trigger']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars(implode(', ', $rule['channels'])); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        <?php echo ($rule['status'] === 'Active') ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                        <?php echo htmlspecialchars($rule['status']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="openAutoResponderModal('edit', '<?php echo htmlspecialchars(json_encode($rule)); ?>')" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</button>
                                    <button onclick="toggleAutoResponderStatus('<?php echo htmlspecialchars($rule['id']); ?>', '<?php echo htmlspecialchars($rule['status']); ?>')" class="text-yellow-600 hover:text-yellow-900 mr-4">Toggle Status</button>
                                    <button onclick="deleteAutoResponder('<?php echo htmlspecialchars($rule['id']); ?>')" class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <div id="autoResponderModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="autoResponderModalTitle">Create New Auto-Responder Rule</h3>
            <form id="autoResponderForm" onsubmit="return saveAutoResponderRule()">
                <input type="hidden" id="autoResponderRuleId">
                <div class="mb-4">
                    <label for="ruleName" class="block text-sm font-medium text-gray-700">Rule Name</label>
                    <input type="text" id="ruleName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="triggerType" class="block text-sm font-medium text-gray-700">Trigger Type</label>
                    <select id="triggerType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Keyword">Keyword</option>
                        <option value="Event Type">Event Type</option>
                        <option value="Time">Time</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="triggerContent" class="block text-sm font-medium text-gray-700">Trigger Content</label>
                    <input type="text" id="triggerContent" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., 'flood', 'baha' or 'Earthquake' or 'Off-hours'" required>
                </div>
                <div class="mb-4">
                    <label for="responseMessage" class="block text-sm font-medium text-gray-700">Response Message</label>
                    <textarea id="responseMessage" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., If you are in a flood-prone area, please move to higher ground." required></textarea>
                </div>
                <div class="mb-4">
                    <label for="channels" class="block text-sm font-medium text-gray-700">Channels (Select all that apply)</label>
                    <div class="mt-1 flex flex-wrap gap-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="channelSMS" value="SMS" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">SMS</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="channelChat" value="Chat" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Chat</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="channelEmail" value="Email" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Email</span>
                        </label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="autoResponderStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="autoResponderStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeAutoResponderModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save Rule
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let currentAutoResponders = <?php echo json_encode($autoResponders); ?>;

    window.openAutoResponderModal = function(mode, ruleData = null) {
        const modal = document.getElementById('autoResponderModal');
        const title = document.getElementById('autoResponderModalTitle');
        const ruleIdField = document.getElementById('autoResponderRuleId');
        const ruleNameField = document.getElementById('ruleName');
        const triggerTypeField = document.getElementById('triggerType');
        const triggerContentField = document.getElementById('triggerContent');
        const responseMessageField = document.getElementById('responseMessage');
        const channelSMS = document.getElementById('channelSMS');
        const channelChat = document.getElementById('channelChat');
        const channelEmail = document.getElementById('channelEmail');
        const autoResponderStatusField = document.getElementById('autoResponderStatus');

        if (mode === 'new') {
            title.textContent = 'Create New Auto-Responder Rule';
            ruleIdField.value = '';
            ruleNameField.value = '';
            triggerTypeField.value = 'Keyword';
            triggerContentField.value = '';
            responseMessageField.value = '';
            channelSMS.checked = false;
            channelChat.checked = false;
            channelEmail.checked = false;
            autoResponderStatusField.value = 'Active';
        } else if (mode === 'edit' && ruleData) {
            const rule = JSON.parse(ruleData);
            title.textContent = 'Edit Auto-Responder Rule';
            ruleIdField.value = rule.id;
            ruleNameField.value = rule.name;

            // Parse trigger to determine type and content
            if (rule.trigger.startsWith('Keyword:')) {
                triggerTypeField.value = 'Keyword';
                triggerContentField.value = rule.trigger.substring('Keyword:'.length).trim().replace(/"/g, '');
            } else if (rule.trigger.startsWith('Event Type:')) {
                triggerTypeField.value = 'Event Type';
                triggerContentField.value = rule.trigger.substring('Event Type:'.length).trim();
            } else if (rule.trigger.startsWith('Time:')) {
                triggerTypeField.value = 'Time';
                triggerContentField.value = rule.trigger.substring('Time:'.length).trim();
            } else {
                triggerTypeField.value = 'Keyword'; // Default if unparseable
                triggerContentField.value = rule.trigger;
            }

            responseMessageField.value = rule.response;
            channelSMS.checked = rule.channels.includes('SMS');
            channelChat.checked = rule.channels.includes('Chat');
            channelEmail.checked = rule.channels.includes('Email');
            autoResponderStatusField.value = rule.status;
        }
        modal.classList.remove('hidden');
    };

    window.closeAutoResponderModal = function() {
        document.getElementById('autoResponderModal').classList.add('hidden');
    };

    window.saveAutoResponderRule = function() {
        const ruleId = document.getElementById('autoResponderRuleId').value;
        const ruleName = document.getElementById('ruleName').value;
        const triggerType = document.getElementById('triggerType').value;
        const triggerContent = document.getElementById('triggerContent').value;
        const responseMessage = document.getElementById('responseMessage').value;
        const selectedChannels = [];
        if (document.getElementById('channelSMS').checked) selectedChannels.push('SMS');
        if (document.getElementById('channelChat').checked) selectedChannels.push('Chat');
        if (document.getElementById('channelEmail').checked) selectedChannels.push('Email');
        const autoResponderStatus = document.getElementById('autoResponderStatus').value;

        // Format trigger based on type
        let formattedTrigger = triggerContent;
        if (triggerType === 'Keyword') {
            formattedTrigger = `Keyword: "${triggerContent}"`;
        } else if (triggerType === 'Event Type') {
            formattedTrigger = `Event Type: ${triggerContent}`;
        } else if (triggerType === 'Time') {
            formattedTrigger = `Time: ${triggerContent}`;
        }

        const newRuleData = {
            id: ruleId || 'AR-' + (currentAutoResponders.length + 1).toString().padStart(3, '0'), // Simple ID generation
            name: ruleName,
            trigger: formattedTrigger,
            response: responseMessage,
            channels: selectedChannels,
            status: autoResponderStatus
        };

        if (ruleId) {
            // Update existing rule
            const index = currentAutoResponders.findIndex(r => r.id === ruleId);
            if (index !== -1) {
                currentAutoResponders[index] = newRuleData;
                alert('Auto-responder rule \"' + ruleName + '\" updated successfully!');
            }
        } else {
            // Add new rule
            currentAutoResponders.push(newRuleData);
            alert('Auto-responder rule \"' + ruleName + '\" created successfully!');
        }

        console.log('Saved/Updated Auto-Responder:', newRuleData);
        closeAutoResponderModal();
        location.reload(); // Simple reload for demonstration
        return false;
    }

    window.toggleAutoResponderStatus = function(ruleId, currentStatus) {
        const newStatus = (currentStatus === 'Active') ? 'Inactive' : 'Active';
        if (confirm(`Are you sure you want to ${newStatus} auto-responder rule ${ruleId}?`)) {
            console.log(`Toggling status for rule ${ruleId} to ${newStatus}`);
            // Simulate update
            const index = currentAutoResponders.findIndex(r => r.id === ruleId);
            if (index !== -1) {
                currentAutoResponders[index].status = newStatus;
                alert(`Rule ${ruleId} is now ${newStatus}.`);
            }
            location.reload(); // Simple reload for demonstration
        }
    };

    window.deleteAutoResponder = function(ruleId) {
        if (confirm('Are you sure you want to delete this auto-responder rule? This action cannot be undone.')) {
            // Simulate deletion
            currentAutoResponders = currentAutoResponders.filter(r => r.id !== ruleId);
            alert('Auto-responder rule ' + ruleId + ' deleted.');
            console.log('Deleted Rule ID:', ruleId);
            location.reload(); // Simple reload for demonstration
        }
    };
</script>