<?php

namespace McAPI\Game;

abstract class GameService {

    const MINECRAFT_WEBSITE     = 'minecraft.net';
    const MINECRAFT_SESSION     = 'session.minecraft.net';
    const MINECRAFT_SKINS       = 'skins.minecraft.net';
    const MINECRAFT_TEXTURES    = 'textures.minecraft.net';

    const MOJANG_ACCOUNT        = 'account.mojang.com';
    const MOJANG_AUTH           = 'auth.mojang.com';
    const MOJANG_AUTHSERVER     = 'authserver.mojang.com';
    const MOJANG_SESSIONSERVER  = 'sessionserver.mojang.com';
    const MOJANG_API            = 'api.mojang.com';

    public static function exists($value) {

        if(self::MINECRAFT_WEBSITE == $value) {
            return true;
        }

        if(self::MINECRAFT_SESSION == $value) {
            return true;
        }

        if(self::MINECRAFT_SKINS == $value) {
            return true;
        }

        if(self::MINECRAFT_TEXTURES == $value) {
            return true;
        }

        if(self::MOJANG_ACCOUNT == $value) {
            return true;
        }

        if(self::MOJANG_AUTH == $value) {
            return true;
        }

        if(self::MOJANG_AUTHSERVER == $value) {
            return true;
        }

        if(self::MOJANG_SESSIONSERVER == $value) {
            return true;
        }

        if(self::MOJANG_API == $value) {
            return true;
        }

        return false;

    }

}
