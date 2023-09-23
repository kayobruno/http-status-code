<?php

declare(strict_types=1);

namespace App;

enum HttpStatusCodeCategory
{
	case INFORMATIONAL;
	case SUCCESSFUL;
	case REDIRECTION;
	case CLIENT_ERROR;
	case SERVER_ERROR;
}
