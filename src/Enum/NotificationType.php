<?php

namespace App\Enum;

enum NotificationType: string
{
    case Friend_request = 'Requête d\'ami';
    case Message = 'Message';
    case Event_invite = 'Invitation Événement';
    case Group_invite = 'Invitation Groupe';
    case Comment = 'Commentaire';
    case Like = 'J\'aime';
    case Share = 'Partager';
    case Mention = 'Mention';
    case System = 'Système';
}