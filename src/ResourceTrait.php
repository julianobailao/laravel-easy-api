<?php

namespace JulianoBailao\LaravelEasyApi;

/**
 * Use this trait to implements all traits methods.
 */
trait ResourceTrait
{
    use QueryTrait, IndexTrait, ShowTrait, SaveTrait, ValidationTrait, StoreTrait, UpdateTrait, DestroyTrait;
}
