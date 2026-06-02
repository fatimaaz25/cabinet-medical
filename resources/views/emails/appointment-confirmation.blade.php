<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .container { background: white; padding: 30px; border-radius: 10px; max-width: 600px; margin: auto; }
        .header { background: #1a73e8; color: white; padding: 20px; border-radius: 8px; text-align: center; }
        .info { margin: 20px 0; padding: 15px; background: #f8f9fa; border-radius: 8px; }
        .footer { text-align: center; color: #666; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>🏥 Cabinet Médical</h2>
            <p>Confirmation de Rendez-vous</p>
        </div>
        <div class="info">
            <p>Bonjour <strong>{{ $appointment->user->name }}</strong>,</p>
            <p>Votre rendez-vous a été confirmé avec les détails suivants:</p>
            <ul>
                <li><strong>Service:</strong> {{ $appointment->service->name }}</li>
                <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y H:i') }}</li>
                <li><strong>Statut:</strong> Confirmé</li>
            </ul>
        </div>
        <div class="footer">
            <p>Merci de votre confiance!</p>
            <p>Cabinet Médical - 2026</p>
        </div>
    </div>
</body>
</html>