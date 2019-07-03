<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:53 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface ConstantInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface ConstantInterface
{
    # word
    const OWLLABGROUP = 'owllabgroup';
    const _IMAGE      = '_image';
    const _TYPE        = '_type';
    const TYPE        = 'type';

    # locale constants
    const BOTH_LOCALE = 'both';
    const PERSIAN_LOCALE = 'fa';
    const ENGLISH_LOCALE = 'en';

    # user roles
    const USER_ROLE = 'USER_ROLE';
    const ADMIN_ROLE = 'ADMIN_ROLE';
    const SUPER_ADMIN_ROLE = 'SUPER_ADMIN_ROLE';

    # length constants
    const TITLE_LENGTH_MIN = 0;
    const TITLE_LENGTH_MAX = 100;

    const SLUG_LENGTH_MIN = 0;
    const SLUG_LENGTH_MAX = 100;

    const EMAIL_LENGTH_MIN = 8;
    const EMAIL_LENGTH_MAX = 80;

    const NAME_LENGTH_MIN = 0;
    const NAME_LENGTH_MAX = 50;

    const PHONE_LENGTH_MIN = 11;
    const PHONE_LENGTH_MAX = 11;

    const DESCRIPTION_LENGTH_MIN = 0;
    const DESCRIPTION_LENGTH_MAX = 1000;

    # date and time formats
    const DATE_TIME_FORMAT = self::DATE_FORMAT . ' ' . self::TIME_FORMAT;
    const DATE_FORMAT = 'Y/m/d';
    const TIME_FORMAT = 'H:i';
    const YEAR_FORMAT = 'Y';
    const MONTH_FORMAT = 'M';
    const DAY_FORMAT = 'D';
    const HOUR_FORMAT = 'H';

    # form options
    const LABEL_OPTION = 'label';
    const REQUIRED_OPTION = 'required';
    const DATE_CLASS_OPTION = 'data_class';
    const CSRF_PROTECTION_OPTION = 'csrf_protection';
}