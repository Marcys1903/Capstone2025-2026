<?php
// --- PHP PLACEHOLDER LOGIC ---
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample chat sessions (in a real app, these would be dynamic from DB)
$chatSessions = [
    ['id' => 'CHAT-001', 'user' => 'Lunaria', 'status' => 'Active', 'last_message' => 'Sana soon makita na ulit kita.', 'time' => '10:35 AM'],
    ['id' => 'CHAT-002', 'user' => 'Business Owner B', 'status' => 'Idle', 'last_message' => 'Is the power restored in my area?', 'time' => '09:15 AM'],
    ['id' => 'CHAT-003', 'user' => 'Student C', 'status' => 'Closed', 'last_message' => 'Thanks for the info!', 'time' => 'Yesterday'],
];

// Sample messages for active chat (mock)
$activeChatMessages = [
    ['sender' => 'Lunaria', 'message' => 'Hello, Kumusta?.', 'time' => '10:35 AM'],
    ['sender' => 'Admin Marcus', 'message' => 'Hello, I really miss you too my Luna', 'time' => '10:36 AM'],
    ['sender' => 'Lunaria', 'message' => 'Sana soon makita na ulit kita', 'time' => '10:37 AM'],
];
?>
<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Live Chat Gateway</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Admin</h2>
        <p class="text-gray-700 leading-relaxed">
            The Live Chat Gateway enables administrators to engage in real-time, two-way communication with individuals or groups, providing immediate assistance and clarification during emergencies.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md flex flex-col lg:flex-row h-[700px]">
        <div class="w-full lg:w-1/3 border-r border-gray-200 p-4 flex flex-col">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Active Chat Sessions</h3>
            <div class="flex-grow overflow-y-auto custom-scrollbar">
                <?php if (empty($chatSessions)): ?>
                    <p class="text-gray-500 text-center mt-8">No active chat sessions.</p>
                <?php else: ?>
                    <?php foreach ($chatSessions as $session) : ?>
                        <div class="flex items-center p-3 mb-2 rounded-lg cursor-pointer hover:bg-gray-100
                            <?php echo ($session['id'] === 'CHAT-001') ? 'bg-blue-50 border border-blue-200' : 'bg-white border border-gray-100'; ?>" onclick="loadChatSession('<?php echo htmlspecialchars(json_encode($session)); ?>')">
                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center
                                <?php echo ($session['status'] === 'Active') ? 'border-2 border-green-400' : 'border-2 border-gray-400'; ?>">
                                <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="flex-grow ml-3">
                                <p class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($session['user']); ?></p>
                                <p class="text-xs text-gray-500 truncate"><?php echo htmlspecialchars($session['last_message']); ?></p>
                            </div>
                            <span class="text-xs text-gray-400"><?php echo htmlspecialchars($session['time']); ?></span>
                            <?php if ($session['status'] === 'Active'): ?>
                                <span class="ml-2 w-2 h-2 bg-green-500 rounded-full"></span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="w-full lg:w-2/3 p-4 flex flex-col bg-gray-50 rounded-lg">
            <div id="chat-window-header" class="bg-gray-200 p-3 rounded-t-lg text-lg font-semibold text-gray-800 mb-4">
                Lunaria
            </div>
            <div id="chat-messages" class="flex-grow overflow-y-auto custom-scrollbar p-4 bg-white rounded-lg shadow-inner mb-4">
                <?php foreach ($activeChatMessages as $message) : ?>
                    <div class="flex <?php echo ($message['sender'] === $userName) ? 'justify-end' : 'justify-start'; ?> mb-4">
                        <div class="max-w-xs lg:max-w-md px-4 py-2 rounded-lg
                            <?php echo ($message['sender'] === $userName) ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800'; ?>">
                            <p class="text-sm"><?php echo htmlspecialchars($message['message']); ?></p>
                            <span class="block text-right text-xs mt-1 <?php echo ($message['sender'] === $userName) ? 'text-blue-200' : 'text-gray-500'; ?>"><?php echo htmlspecialchars($message['time']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="border-t border-gray-200 pt-4">
                <div class="flex items-center">
                    <input type="text" id="chat-input" placeholder="Type your message..."
                           class="flex-grow px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-800">
                    <button id="send-message-button" class="ml-3 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatMessagesDiv = document.getElementById('chat-messages');
        const chatInput = document.getElementById('chat-input');
        const sendMessageButton = document.getElementById('send-message-button');
        const chatWindowHeader = document.getElementById('chat-window-header');
        const adminUserName = "<?php echo htmlspecialchars($userName); ?>"; // Get admin's name from PHP

        function appendMessage(sender, message, time, isAdmin) {
            const messageElement = document.createElement('div');
            messageElement.classList.add('flex', 'mb-4', isAdmin ? 'justify-end' : 'justify-start');

            messageElement.innerHTML = `
                <div class="max-w-xs lg:max-w-md px-4 py-2 rounded-lg ${isAdmin ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800'}">
                    <p class="text-sm">${message}</p>
                    <span class="block text-right text-xs mt-1 ${isAdmin ? 'text-blue-200' : 'text-gray-500'}">${time}</span>
                </div>
            `;
            chatMessagesDiv.appendChild(messageElement);
            chatMessagesDiv.scrollTop = chatMessagesDiv.scrollHeight; // Scroll to bottom
        }

        sendMessageButton.addEventListener('click', function() {
            const message = chatInput.value.trim();
            if (message) {
                const now = new Date();
                const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                appendMessage(adminUserName, message, timeString, true);
                chatInput.value = ''; // Clear input

                // In a real application, send this message via AJAX to a backend.
                // The backend would then forward it to the actual user and save it.
                console.log('Admin sent:', message);
            }
        });

        chatInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                sendMessageButton.click();
            }
        });

        // Function to simulate loading a chat session
        window.loadChatSession = function(sessionJson) {
            const session = JSON.parse(sessionJson);
            chatWindowHeader.textContent = `Chat with ${session.user}`;
            chatMessagesDiv.innerHTML = ''; // Clear current messages

            // Simulate loading messages for the selected session
            // In a real app, this would be an AJAX call to fetch messages for session.id
            const simulatedMessages = [
                { sender: session.user, message: session.last_message, time: session.time },
                { sender: adminUserName, message: 'How can I assist you further?', time: 'Just now' }
            ];
            simulatedMessages.forEach(msg => {
                appendMessage(msg.sender, msg.message, msg.time, msg.sender === adminUserName);
            });
            console.log('Loaded chat session:', session.id);
        };

        // Initial scroll to bottom on load
        chatMessagesDiv.scrollTop = chatMessagesDiv.scrollHeight;
    });
</script>