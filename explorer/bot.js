document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('send-button').addEventListener('click', async function() {
        const userInput = document.getElementById('user-input').value;
        document.getElementById('messages').innerHTML += `<div>User: ${userInput}</div>`;
        document.getElementById('user-input').value = '';

        try {
            const response = await fetch('https://api.gemini.com/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer AIzaSyDvSj7QdCXOFxEn3iyAc6G1Gba6l2TkahE`, // Replace with your actual API key
                },
                body: JSON.stringify({ message: userInput })
            });

            const data = await response.json();

            if (response.ok) {
                document.getElementById('messages').innerHTML += `<div>Gemini: ${data.reply}</div>`;
            } else {
                console.error('Error response:', data);
                document.getElementById('messages').innerHTML += `<div>Gemini: ${data.error || 'An error occurred'}</div>`;
            }
        } catch (error) {
            console.error('Fetch error:', error);
            document.getElementById('messages').innerHTML += `<div>Gemini: An error occurred while contacting the server.</div>`;
        }
    });
});