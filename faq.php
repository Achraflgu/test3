<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Bot</title>
    <style>
        /* Centered title container with enhanced styling */
        .title-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
        }
        .title-container h1 {
            width: 80%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            color: #ffffff;
            text-shadow: 4px 4px 2px rgba(0, 0, 0, 0.6);
            font-size: 80px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }
        /* Chatbot toggler button */
        .main-chatbox .chatbot-toggler {
            position: fixed;
            bottom: 30px;
            right: 35px;
            outline: none;
            border: none;
            height: 50px;
            width: 50px;
            display: flex;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #606da6;
            transition: all 0.3s ease;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            z-index: 9999;
        }
        body.show-chatbot .main-chatbox .chatbot-toggler {
            transform: rotate(90deg);
        }
        .main-chatbox .chatbot-toggler span {
            position: absolute;
            display: flex;
        }
        .main-chatbox .chatbot-toggler span:first-child img {
            width: 50px;
            filter: brightness(0) invert(1);
        }
        .main-chatbox .chatbot-toggler span:last-child img {
            width: 15px;
            filter: brightness(0) invert(1);
        }
        .main-chatbox .chatbot-toggler span:last-child,
        body.show-chatbot .main-chatbox .chatbot-toggler span:first-child {
            opacity: 0;
        }
        body.show-chatbot .main-chatbox .chatbot-toggler span:last-child {
            opacity: 1;
        }
        /* Chatbot container */
        .main-chatbox .chatbot {
            position: fixed;
            right: 35px;
            bottom: 90px;
            width: 320px;
            background: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
            transform: scale(0.5);
            transform-origin: bottom right;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1), 0 32px 64px -48px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            z-index: 9999;
        }
        body.show-chatbot .main-chatbox .chatbot {
            opacity: 1;
            pointer-events: auto;
            transform: scale(1);
        }
        /* Chatbot header */
        .main-chatbox .chatbot header {
            padding: 15px;
            color: #fff;
            background: #606da6;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .main-chatbox .chatbot header small,
        .main-chatbox .chatbot header h2 {
            display: flex;
            align-items: center;
            margin-left: 10px;
        }
        .main-chatbox header h2 {
            font-size: 1.2rem;
            color: white;
            margin: 0 0 0px !important;
        }
        .main-chatbox .chatbot header small img {
            width: 12px;
            height: 12px;
            margin-right: 5px;
        }
        /* Chatbox styling */
        .main-chatbox .chatbot .chatbox {
            overflow-y: auto;
            max-height: 400px;
            padding: 20px;
            scrollbar-width: thin;
        }
        .main-chatbox .chatbox li.chat {
            margin-bottom: 10px;
            display: flex;
            list-style: none;
        }
        .main-chatbox .chatbox .outgoing {
            justify-content: flex-end;
        }
        .main-chatbox .chatbox .incoming span {
            width: 32px;
            height: 32px;
            color: #fff;
            text-align: center;
            line-height: 32px;
            align-self: flex-end;
            background: #c9d4e2;
            border-radius: 4px;
            margin: 0 10px 2px 0;
        }
        .main-chatbox .chatbox .chat p {
            white-space: pre-wrap;
            padding: 12px 16px;
            border-radius: 20px 20px 0 20px;
            max-width: 75%;
            color: #fff;
            font-size: 0.95rem;
            background: #33a6fd;
        }
        .main-chatbox .chatbox .incoming p {
            border-radius: 20px 20px 20px 0;
            color: #000;
            background: #f2f2f2;
        }
        .main-chatbox .chatbox .chat p.error {
            color: #721c24;
            background: #f8d7da;
        }
        .main-chatbox .chatbox .incoming span img {
            margin-top: 3px;
            width: 26px;
        }
        /* Chat input area */
        .main-chatbox .chatbot .chat-input {
            display: flex;
            position: absolute;
            bottom: 0;
            width: 100%;
            background: #f1f1f1;
            padding: 13px 20px;
            border-top: 1px solid #ddd;
        }
        .main-chatbox .chat-input textarea {
            height: 50px;
            width: 90%;
            border: none;
            outline: none;
            resize: none;
            max-height: 180px;
            padding: 15px 15px 5px 5px;
            font-size: 0.95rem;
            background-color: transparent;
        }
        .main-chatbox .chat-input span {
            align-self: flex-end;
            color: #0b4be1;
            cursor: pointer;
            height: 55px;
            display: flex;
            align-items: center;
        }
        .main-chatbox .chat-input span img {
            margin: 10px;
            width: 35px;
        }
        /* Option buttons */
        .main-chatbox .options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px;
            justify-content: center;
        }
        .main-chatbox .option {
            padding: 8px 16px;
            background-color: #c8e2ff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, transform 0.2s;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .main-chatbox .option:hover {
            background-color: #a8ceff;
        }
        .main-chatbox .option:focus {
            outline: none;
        }
        .main-chatbox .option:active {
            background-color: #86b6ff;
            transform: translateY(1px);
        }
        /* Responsive adjustments */
        @media (max-width: 490px) {
            .main-chatbox .chatbot-toggler {
                right: 20px;
                bottom: 20px;
            }
            .main-chatbox .chatbot {
                right: 0;
                bottom: 0;
                height: 100%;
                border-radius: 0;
                width: 100%;
            }
            .main-chatbox .chatbot .chatbox {
                height: 90%;
                padding: 25px 15px 100px;
            }
            .main-chatbox .chatbot .chat-input {
                padding: 5px 15px;
            }
            .main-chatbox .chatbot header span {
                display: block;
            }
        }
        .chatbot header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            /* Adjust as needed */
            background-color: #f0f0f0;
            /* Example background color */
        }
        .chatbot .header-right {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="main-chatbox">
            <button class="chatbot-toggler">
                <span><img src="https://freesvg.org/img/1538298822.png" alt=""></span>
                <span><img src="https://img.icons8.com/?size=256&id=71200&format=png" alt=""></span>
            </button>
            <div class="chatbot">
                <header>
                    <h2>FAQ Bot</h2>
                    <div class="header-right">
                        <small><img src="https://img.icons8.com/?size=256&amp;id=JIlJqN3SJL07&amp;format=png" alt="">Online</small>
                        <span class="close-btn"></span>
                    </div>
                </header>
                <ul class="chatbox">
                    <li class="chat incoming">
                        <span><img src="https://img.icons8.com/?size=256&id=37410&format=png" alt=""></span>
                        <p>Hi there! I'm FAQ Bot. How can I assist you today?</p>
                    </li>
                </ul>
                <div class="options">
                    <button class="option">Shipping</button>
                    <button class="option">Track Order</button>
                    <button class="option">Return Policy</button>
                    <button class="option">Membership</button>
                    <button class="option">Fitness Programs</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const chatbotToggler = document.querySelector(".main-chatbox .chatbot-toggler");
        const closeBtn = document.querySelector(".main-chatbox .close-btn");
        const chatbox = document.querySelector(".main-chatbox .chatbox");
        const optionsContainer = document.querySelector(".main-chatbox .options");
        let prevQuestion = "";
        const faqs = [{
                question: "What are your shipping options?",
                answer: "We offer standard and express shipping. Standard shipping takes 3-5 business days, while express shipping delivers in 1-2 business days.",
                followUps: [{
                        question: "Can I change my shipping address?",
                        answer: "Yes, you can change your shipping address before the order is shipped. Please contact support immediately."
                    },
                    {
                        question: "What is the cost of express shipping?",
                        answer: "The cost varies based on location and order weight. Exact cost is shown at checkout."
                    }
                ]
            },
            {
                question: "How can I track my order?",
                answer: "Visit the 'Track Order' page on our website. Enter your order number and email for real-time updates.",
                followUps: [{
                        question: "What if I don't have my order number?",
                        answer: "Check your confirmation email or contact support for assistance."
                    },
                    {
                        question: "Can I track my order internationally?",
                        answer: "Yes, international orders can be tracked with the provided tracking information."
                    }
                ]
            },
            {
                question: "What is your return policy?",
                answer: "We have a 30-day return policy. Return items within 30 days for a refund or exchange. Items must be unused and in original packaging.",
                followUps: [{
                        question: "How do I initiate a return?",
                        answer: "Visit our 'Return Policy' page and fill out the return form. Our support team will guide you."
                    },
                    {
                        question: "Are there items that cannot be returned?",
                        answer: "Yes, perishable goods, custom products, and sale items cannot be returned. See our return policy for details."
                    }
                ]
            },
            {
                question: "What membership options do you offer?",
                answer: "We offer monthly, quarterly, and annual memberships. All plans include access to gym facilities, classes, and online resources.",
                followUps: [{
                        question: "Can I upgrade my membership plan?",
                        answer: "Yes, you can upgrade anytime. Contact membership services for details."
                    },
                    {
                        question: "Are there discounts for annual memberships?",
                        answer: "Yes, annual memberships can save up to 20% compared to monthly plans."
                    }
                ]
            },
            {
                question: "What fitness programs do you offer?",
                answer: "We offer programs for weight loss, muscle gain, and general fitness. Programs include personalized coaching and group classes.",
                followUps: [{
                        question: "Do you offer beginner programs?",
                        answer: "Yes, our beginner programs help you get started with basic exercises and guidance."
                    },
                    {
                        question: "Can I switch programs after enrolling?",
                        answer: "Yes, you can switch programs anytime. Our coaches will assist in the transition."
                    }
                ]
            }
        ];
        const createChatLi = (message, className) => {
            const chatLi = document.createElement("li");
            chatLi.classList.add("chat", className);
            let chatContent = className === "outgoing" ? `<p></p>` : `<span><img src="https://img.icons8.com/?size=256&id=37410&format=png" alt="Bot Icon"></span><p></p>`;
            chatLi.innerHTML = chatContent;
            chatLi.querySelector("p").textContent = message;
            return chatLi;
        }
        const displayOptions = (options, isMainOptions = false) => {
            optionsContainer.innerHTML = "";
            options.forEach((option, index) => {
                const button = document.createElement("button");
                button.classList.add("option");
                button.textContent = option.question;
                button.addEventListener("click", () => {
                    const userSelection = button.textContent;
                    const outgoingChatLi = createChatLi(userSelection, "outgoing");
                    chatbox.appendChild(outgoingChatLi);
                    chatbox.scrollTo(0, chatbox.scrollHeight);
                    if (isMainOptions) {
                        generateResponse(index);
                    } else {
                        generateFollowUpResponse(index, option);
                    }
                });
                optionsContainer.appendChild(button);
            });
            if (!isMainOptions) {
                const backButton = document.createElement("button");
                backButton.classList.add("option");
                backButton.textContent = "Back to main options";
                backButton.addEventListener("click", () => {
                    displayOptions(faqs.map(faq => ({
                        question: faq.question
                    })), true);
                });
                optionsContainer.appendChild(backButton);
            }
        }
        const generateResponse = (selectedOption) => {
            const selectedFAQ = faqs[selectedOption];
            if (selectedFAQ) {
                const typingLi = createChatLi("...", "incoming");
                chatbox.appendChild(typingLi);
                chatbox.scrollTo(0, chatbox.scrollHeight);
                setTimeout(() => {
                    chatbox.removeChild(typingLi);
                    const incomingChatLi = createChatLi(selectedFAQ.answer, "incoming");
                    chatbox.appendChild(incomingChatLi);
                    chatbox.scrollTo(0, chatbox.scrollHeight);
                    if (selectedFAQ.followUps) {
                        displayOptions(selectedFAQ.followUps);
                    }
                }, Math.random() * 2000 + 1000); 
                prevQuestion = selectedFAQ.question;
            } else {
                const incomingChatLi = createChatLi("I'm sorry, I couldn't find an answer to your question. Please contact support for further assistance.", "incoming");
                chatbox.appendChild(incomingChatLi);
                chatbox.scrollTo(0, chatbox.scrollHeight);
            }
        }
        const generateFollowUpResponse = (index, followUpOption) => {
            const typingLi = createChatLi("...", "incoming");
            chatbox.appendChild(typingLi);
            chatbox.scrollTo(0, chatbox.scrollHeight);
            setTimeout(() => {
                chatbox.removeChild(typingLi);
                const incomingChatLi = createChatLi(followUpOption.answer, "incoming");
                chatbox.appendChild(incomingChatLi);
                chatbox.scrollTo(0, chatbox.scrollHeight);
                const parentFAQ = faqs.find(f => f.followUps && f.followUps.includes(followUpOption));
                if (parentFAQ) {
                    displayOptions(parentFAQ.followUps);
                }
            }, Math.random() * 2000 + 1000); 
        }
        closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
        chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
        displayOptions(faqs.map(faq => ({
            question: faq.question
        })), true);
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const helpLink = document.getElementById("helpLink");
            const chatbotToggler = document.querySelector(".main-chatbox .chatbot-toggler");
            helpLink.addEventListener("click", function(event) {
                event.preventDefault(); 
                document.body.classList.add("show-chatbot"); 
            });
        });
    </script>
</body>
</html>